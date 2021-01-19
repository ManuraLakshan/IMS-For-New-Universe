<?php

defined('BASEPATH') OR exit('no derict script access allowed');

class departmentControler extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('departmentModel');
	}

	public function view()
	{
		$this->load->view('Partials/header');

		$department = new departmentModel;
		$data['department'] = $department->getDeparments();
		$this->load->view('departments_data', $data);

		$this->load->view('Partials/footer');

	}

	public function create()
	{
		$this->load->view('Partials/header');
		$this->load->view('create_department');
		$this->load->view('Partials/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('dep_id','Department Id','required|is_unique[department.dep_id]');
        $this->form_validation->set_rules('dep_name','Department Name','required|is_unique[department.dep_name]');
        $this->form_validation->set_rules('dep_email','Email','required|is_unique[department.dep_email]');
        $this->form_validation->set_rules('dep_contact','Contact','required|numeric');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('Partials/header');
			$this->load->view('create_department');
			$this->load->view('Partials/footer');
        }
        else{
        	$data = [
        	'dep_id' => $this->input->post('dep_id'),
        	'dep_name' => $this->input->post('dep_name'),
       		'dep_email' => $this->input->post('dep_email'),
  			'dep_contact' => ($this->input->post('dep_contact'))	
        	];

        	$department = new departmentModel;
        	$res = $department->insertDepartment($data);

           	$this->session->set_flashdata('status', 'Data insreted Successfully');
        	redirect(base_url('index.php/dep'));
        }
        
	}

	public function edit($id)
	{
		$this->load->view('Partials/header');

		$department = new departmentModel;
		$data['department'] = $department->editDepartment($id);
		$this->load->view('update_department', $data);

		$this->load->view('Partials/footer');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('dep_id','Department Id','required|callback_id_check');
        $this->form_validation->set_rules('dep_name','Department Name','required');
        $this->form_validation->set_rules('dep_email','Email','required|callback_email_check');
        $this->form_validation->set_rules('dep_contact','Contact','required|numeric');
      
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            
			$this->edit($id);
        }
        else{
        	$data = [
        	'dep_id' => $this->input->post('dep_id'),
        	'dep_name' => $this->input->post('dep_name'),
       		'dep_email' => $this->input->post('dep_email'),
  			'dep_contact' => $this->input->post('dep_contact')
        	];

        	$department = new departmentModel;
        	$res = $department->updatetDepartment($data, $id);

           	$this->session->set_flashdata('status', 'Data Updated Successfully');
        	redirect(base_url('index.php/dep'));
        }
	}

	function id_check(){
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM department WHERE dep_id = '$post[dep_id]' AND dep_email != '$post[dep_email]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('id_check', 'This {field} Already exits, Enter another Id');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

	function email_check(){
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM department WHERE dep_email = '$post[dep_email]' AND dep_id != '$post[dep_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('email_check', 'This {field} Already exits, Enter another email address');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function delete($id)
    {
    		$department = new departmentModel;
    		$department->deleteDepartment($id);
    		$this->session->set_flashdata('status', 'Record Deleted Successfully');
        	redirect(base_url('index.php/dep'));
    }

}

?>
