<?php

class user extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_user');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->model_user->get();
		$this->load->view('user_data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('uid','User Id','required|is_unique[user.user_id]');
		$this->form_validation->set_rules('uname','User Name','required|is_unique[user.user_name]');
		$this->form_validation->set_rules('email','Email','required|is_unique[user.user_email]');
		$this->form_validation->set_rules('role','User Role','required');
		$this->form_validation->set_rules('dob','Date Of Birth','required');
		$this->form_validation->set_rules('mobile','Mobile','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('password','Password','required|min_length[5]');
		$this->form_validation->set_rules('passconf','Password Conform','required|matches[password]');
		$this->form_validation->set_rules('avataar','Avataar');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('user_form_add');
		}
		else{
			$post = $this->input->post(null, TRUE);
			$this->model_user->add($post);

			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('data insret successfully');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}
	}

	public function edit($id)
	{
		// $this->form_validation->set_rules('uid','User Id','required|callback_id_check');
		$this->form_validation->set_rules('uname','User Name','required|callback_user_name_check');
		$this->form_validation->set_rules('email','Email','required|callback_email_check');

		if ($this->input->post('password')) {

			$this->form_validation->set_rules('password','Password','min_length[5]');
			$this->form_validation->set_rules('passconf','Password Conform','matches[password]');
		}
		if ($this->input->post('passconf')) {

			$this->form_validation->set_rules('passconf','Password Conform','matches[password]');
		}
		$this->form_validation->set_rules('role','User Role');
		$this->form_validation->set_rules('dob','Birthday');
		$this->form_validation->set_rules('mobile','Mobile');
		$this->form_validation->set_rules('address','Addaress');
		$this->form_validation->set_rules('avataar','Avataar');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {

			$query = $this->model_user->get($id);

			if ($query->num_rows() > 0) {

				$data['row'] = $query->row();
				$this->load->view('user_form_edit', $data);
			}
			else{
				echo "<script>alert('no record');";
				echo "window.location='".site_url('user')."';</script>";
			}
		}
		else{
			$post = $this->input->post(null, TRUE);
			$this->model_user->edit($post);

			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Updated');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}
	}

	function email_check(){
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE user_email = '$post[email]' AND user_id != '$post[uid]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('email_check', '{field} Already exits, Enter another email address');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	function user_name_check(){
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE user_name = '$post[uname]' AND user_id != '$post[uid]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('user_name_check', '{field} Already exits, Enter another user name');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	// function id_check(){
	//     $post = $this->input->post(null, TRUE);
	//     $query = $this->db->query("SELECT * FROM user WHERE user_id = '$post[uid]' AND user_email != '$post[email]'");
	//     if ($query->num_rows() > 0) {
	//         $this->form_validation->set_message('id_check', '{field} already exits, check user id..');
	//         return FALSE;
	//     }
	//     else{
	//         return TRUE;
	//     }
	// }

	public function del(){

		$id = $this->input->post('user_id');
		$this->model_user->del($id);

		if ($this->db->affected_rows() > 0) {
			//echo "<script>alert('record delete successfully');</script>";
			$this->session->set_flashdata('pass','Record Delete Successfully');
		}
		echo "<script>window.location='".site_url('user')."';</script>";
	}
}

