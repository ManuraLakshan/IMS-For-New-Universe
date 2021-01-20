<?php


class form_controller extends CI_Controller
{
	public function add_damage_goods(){

		$this->form_validation->set_rules('meterial_id','Material ID','required');
		$this->form_validation->set_rules('meterial_type','Material Type','required');
		$this->form_validation->set_rules('date','Date','required');
		$this->form_validation->set_rules('stock_quantity','Quantity','required');



		if($this->form_validation->run() == FALSE){
			$this->load->view('add_damaged_goods');
		}else{

			$this->load->model('StockItems');
			$responce = $this->StockItems->add_damaged_items();
			echo $responce;


			if ($responce = true){

				$this->session->set_flashdata('msg','Data Entered Successfully');
				redirect('Welcome/Add_Damaged_Goods');

			}else{


			}

		}
	}
	public function Logging_user(){
		$this->form_validation->set_rules('user_name','Username','required');
		$this->form_validation->set_rules('pwd','Password','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('page_login');
		}else {
			$this->load->model('StockItems');
			$responce = $this->StockItems->Login_user();

			if($responce != false){

				$user_data = array(

					'user_id' => $responce->user_id,
					'user_name' => $responce->user_name,
					'user_email' => $responce->user_email,
					'avataar' => $responce->avataar,
					'role' => $responce->role,
					'loggedin'=>TRUE

				);
				if($responce->role == 'ADMIN'){
					$_SESSION["Roll"]="admin";
					$this->session->set_userdata($user_data);
					$_SESSION['Login_user']=$user_data;
					$this->session->set_flashdata('Welcome','You are warmly welcome');
					$this->load->model("GlobalMethods");
					$this->GlobalMethods->logger($this->session->userdata('user_name'),"Logged In");
					redirect('UserAccounts/UserAdmin');
				}
				elseif($responce->role == 'SUPER'){
					redirect('LogBookController/loadLogBookView');
				}else{
					$_SESSION["Roll"]="staff";
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('Welcome','You are warmly welcome');
					$this->load->model("GlobalMethods");
					$this->GlobalMethods->logger($this->session->userdata('user_name'),"Logged In");
					redirect('UserAccounts/UserStaff');
				}

			}else{
				$this->session->set_flashdata('Errormag','Email or password wrong');
				redirect('Welcome/Logging');
			}

		}

	}

	public function Logout_user(){

		$this->load->model("GlobalMethods");
		$this->GlobalMethods->logger($this->session->userdata('user_name'),"Log outed");

		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_email');
		$this->session->unset_userdata('avataar');
		$this->session->unset_userdata('loggedin');
		redirect('Welcome/Logging');
	}

	public function user_request(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('request_user_name','User name','required');
		$this->form_validation->set_rules('request_email','E mail','required|valid_email');
		$this->form_validation->set_rules('user_type','User Type','required');


		if($this->form_validation->run() == FALSE){

			$this->load->view('system_allocation_request');

		}else{
			$this->load->model('Users');
			$responce = $this->Users->user_request();
			if ($responce){
				$this->session->set_flashdata('msg','Data Entered Successfully');
				redirect('Welcome/Logging');

			}else{


			}



		}

	}

}
