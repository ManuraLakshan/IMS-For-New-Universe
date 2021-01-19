<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('page_login');
	}

	public function logoButton(){
		$this->load->view('welcomeView');
	}

	public function dashboard(){
		$this->load->view('index');
	}

	public function page_login(){
		$this->load->view('page_login');
	}
	public function page_register(){
		$this->load->view('page-register');
	}
	public function add_user(){
		$this->load->view('page_register');
	}
	public function check_inventory(){
		$this->load->view('check_inventory');
	}
	public function add_inventory(){
		$this->load->view('Add_inventory');
	}
	public function issue_inventory(){
		$this->load->view('issue_inventory');
	}
	public function view_inventory(){
		$this->load->model("StockItems");
		$data["fetch_fabric_data"]=$this->StockItems->fetch_Fabric_data();
		$this->load->view('view_inventory',$data);
	}
	public function view_overall_inventory(){
		$this->load->model("StockItems");
		$data["view_overall_inventory"]=$this->StockItems->View_overall_items();
		$this->load->view('view_overall_inventory',$data);
	}
	/*public function view_inventory_Categories0(){
		$this->load->model("StockItems");
		$cat["category"]=$this->StockItems->
	}
	public function view_inventory_Categories1(){
		$this->load->model("StockItems");
		$cat["category"]=$this->StockItems->
	}*/
	public function add_bom(){
		$this->load->view('add_bom');
	}

	public function check_requirement(){
		$this->load->model('CheckRequirement');
		$get_bom=$this->CheckRequirement-> get_Bom();
		$get_stock=$this->CheckRequirement-> get_stock();
		$get_bom_M_ID=$this->CheckRequirement-> get_Bom_M_ID();
		$get_Style=$this->CheckRequirement->get_style();
		$get_quantity=$this->CheckRequirement->get_quantity();
		$load_quantity=$this->CheckRequirement->load_quantity();
		$get_requset=$this->CheckRequirement->get_requset();

		// $data['details'] = request_quantity($quantity,$id,$bom_id,$total_quantity,$style_id);
		// $this->load->view('check_requirement',$data);
		$this->load->view('check_requirement',['get_requset'=>$get_requset,'load_quantity'=>$load_quantity,'get_quantity'=>$get_quantity,'get_style'=>$get_Style,'get_stock'=>$get_stock,'get_Bom'=>$get_bom,'get_Bom_M_ID'=>$get_bom_M_ID]);

	}

	public function reduas_quantity(){
		$id=$this->uri->segment(3);
		$quantity=$this->uri->segment(4);
		$bom_id=$this->uri->segment(5);
		$this->load->model('CheckRequirement');
		$this->CheckRequirement->reduas_quantity($id,$quantity,$bom_id);
		redirect('Welcome/check_requirement');
	}

	public function request_quantity(){
		$id=$this->uri->segment(3);
		$quantity=$this->uri->segment(4);
		$total_quantity=$this->uri->segment(5);
		$bom_id=$this->uri->segment(6);
		$style_id=$this->uri->segment(7);
		$this->load->model('CheckRequirement');
		$this->CheckRequirement->request_quantity($id,$quantity,$total_quantity,$bom_id,$style_id);
		redirect('Welcome/check_requirement');
	}

	public function ready_take(){
		$id=$this->uri->segment(3);
		$quantity=$this->uri->segment(4);
		$bom_id=$this->uri->segment(5);
		$this->load->model('CheckRequirement');
		$this->CheckRequirement->ready_take($quantity,$id,$bom_id);
		redirect('Welcome/check_requirement');
	}

	public function Add_Damaged_Goods(){
		$this->load->view('add_damaged_goods');
	}
	public function View_Damaged_Goods(){
		$this->load->model('StockItems');
		$data["fetch_Damaged_Goods"]=$this->StockItems->View_Damaged_Goods();
		$this->load->view('view_damage_goods',$data);
	}
	public function Logging(){
		$this->load->view('page_login');
	}
	public function User_Request(){
		$this->load->view('system_allocation_request');
	}

	public function User_NotificationPage(){

		$this->load->view('Admin/request');



	}
	public function userRequestRespondSuccess($userId){

		$to =  $this->input->post('from');  // User email pass here
		$subject = 'Welcome To Elevenstech';

		$from = 'pass your email ID';              // Pass here your mail id

		$emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
		$emailContent .='<tr><td style="height:20px"></td></tr>';


		$emailContent .= $this->input->post('message');  //   Post message available here


		$emailContent .='<tr><td style="height:20px"></td></tr>';
		$emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://elevenstechwebtutorials.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";



		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '60';

		$config['smtp_user']    = 'Gmail ID Enter Here';    //Important
		$config['smtp_pass']    = 'Gmail ID Password pass here';  //Important

		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not



		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($emailContent);
		$this->email->send();

		$this->session->set_flashdata('msg',"Mail has been sent successfully");
		$this->session->set_flashdata('msg_class','alert-success');
		return redirect('email_send');
	}
	public function userRequestRespondReject($userId){
		echo "<script>alert($userId)</script>";
	}




	// WATASHA'S welcome controller--------------------------------------------------------------------------------------------------------------------------

	public function form_validation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('material_name', 'material name', 'required');

		if ($this->form_validation->run())
		{
			$this->load->model('orderData');

		}
	}

	public function email()
	{


		$this->form_validation->set_rules('material_name', 'material name', 'required');
		$this->form_validation->set_rules('gatepass', 'gatepass', 'required');
		$this->form_validation->set_rules('material_id', 'material id', 'required');
		$this->form_validation->set_rules('style', 'style', 'required');
		$this->form_validation->set_rules('sample_name', 'sample name', 'required');
		$this->form_validation->set_rules('sample_details', 'sample detail', 'required');
		$this->form_validation->set_rules('color', 'color', 'required');
		$this->form_validation->set_rules('rollNo', 'roll no', 'required');
		$this->form_validation->set_rules('required_qty', 'required qty', 'required');
		$this->form_validation->set_rules('description', 'desciption', 'required');

		$this->load->model("orderData");
		$orderData = $this->orderData->insertorderData();


		if($orderData){
			$this->load->view('email');
			}
	}

	public function email_success()
	{
		$this->load->model("SMSModel");
		$this->SMSModel->sendSMS($this->session->userdata('user_name'),"new order request has sent to your mail, Please check! Thank you!");
		$this->load->view('email_success');

	}


	public function Order_Goods()
	{
		$this->load->model("orderData");
		$result["processData"] = $this->orderData->getorderData();
		$this->load->view('orderProcess',$result);

	}

	public function backupProcess()
	{
		$this->load->model("backupData");
		$result["Data"] = $this->backupData->getbackupData();
		$this->load->view('view_backup',$result);

	}

	public function backup()
	{
		$this->load->model("backupData");
		$data["getbackupData"] = $this->backupData->getbackupData();
		$this->load->view('view_backup',$data);
	}

	public function pre_orders()
	{
		$this->load->view('PreviousOrders');
	}

	public function print_invoice()
	{
		$this->load->view('invoice_view');
	}



//-------------------------------------------------------------------------------------------------------------------------------------------------------






}


