<?php

defined('BASEPATH') OR exit('no derict script access allowed');

class userController extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('userModel');
	}

	public function view()
	{
		$this->load->view('Partials/header');

		$user = new userModel;
		$data['user'] = $user->getUsers();
		$this->load->view('users_data', $data);

		$this->load->view('Partials/footer');
	}

	public function create()
	{
		$this->load->view('Partials/header');
		$this->load->view('create_user');
		$this->load->view('Partials/footer');
	}

	public function store()
	{
		
		$this->form_validation->set_rules('uid','User Id','required|is_unique[user.user_id]');
        $this->form_validation->set_rules('uname','User Name','required|is_unique[user.user_name]');
        $this->form_validation->set_rules('email','Email','required|is_unique[user.user_email]');
        $this->form_validation->set_rules('role','User Role','required');
        $this->form_validation->set_rules('dob','Date Of Birth','required');
        $this->form_validation->set_rules('mobile','Mobile','required|numeric');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('password','Password','required|min_length[5]');
        $this->form_validation->set_rules('passconf','Password Conform','required|matches[password]');
        $this->form_validation->set_rules('user_image','image');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run()) 
        {
        	
        	$original_filename = $_FILES['user_image']['name'];
        	$new_name = time()."".str_replace(' ', '-', $original_filename);

        	$config = [
        		'upload_path' => './images/avatar/',
        		'allowed_types' => 'gif|jpg|png',
        		'file_name' => $new_name,
        	];
        	$this->load->library('upload', $config);
        	if ( ! $this->upload->do_upload('user_image')) 
        	{
        		$imageError = array('imageError' => $this->upload->display_errors());
        		$this->load->view('Partials/header');
				$this->load->view('create_user', $imageError);
				$this->load->view('Partials/footer');
        	}
        	else
        	{
        		$user_filename = $this->upload->data('file_name');
        		$data = [
        			'user_id' => $this->input->post('uid'),
        			'user_name' => $this->input->post('uname'),
        			'user_email' => $this->input->post('email'),
        			'password' => sha1($this->input->post('password')),
        			'role' => $this->input->post('role'),
        			'DOB' => $this->input->post('dob'),
        			'mobile' => $this->input->post('mobile'),
        			'address' => $this->input->post('address'),	
        			'avataar' => $user_filename
        		];
        		$user = new userModel;
        		$res = $user->insertUser($data);

        		$this->session->set_flashdata('status', 'Data insreted Successfully');
        		redirect(base_url('index.php/users'));

        		// if ($this->db->affected_rows() > 0) {
          //       echo "<script>alert('Data insreted Successfully...!');</script>";
          //   	}
          //   	echo "<script>window.location='".site_url('users')."';</script>";
        	}
        }
        else
        {
        	$this->create();
        }
	}

	public function edit($id)
	{
		$this->load->view('Partials/header');

		$user = new userModel;
		$data['user'] = $user->editUser($id);
		$this->load->view('update_user', $data);

		$this->load->view('Partials/footer');
	}

	public function update($id)
	{
		//$this->form_validation->set_rules('uid','User Id','required|is_unique[user.user_id]');
        $this->form_validation->set_rules('uname','User Name','required|callback_user_name_check');
        $this->form_validation->set_rules('email','Email','required|callback_email_check');
        $this->form_validation->set_rules('role','User Role','required');
        $this->form_validation->set_rules('dob','Date Of Birth','required');
        $this->form_validation->set_rules('mobile','Mobile','required|numeric');
        $this->form_validation->set_rules('address','Address','required');
        //$this->form_validation->set_rules('password','Password','required|min_length[5]');
        //$this->form_validation->set_rules('passconf','Password Conform','required|matches[password]');
        $this->form_validation->set_rules('user_image','image');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run()) 
        {	
        		$old_filename = $this->input->post('old_user_image');
        		$new_filename = $_FILES["user_image"]['name'];

        		if ($new_filename == TRUE) 
        		{
        			$update_filename = time()."-".str_replace(' ', '-', $_FILES["user_image"]['name']);
        			$config = [
        				'upload_path' => './images/avatar/',
        				'allowed_types' => 'gif|jpg|png',
        				'file_name' => $update_filename,
        			];
        			$this->load->library('upload', $config);

        			if ( ! $this->upload->do_upload('user_image')) 
        			{
        				if (file_exists("./images/avatar/".$old_filename)) {
        					unlink("./images/avatar/".$old_filename);
        				}
        			}
        		}
        		else
        		{
        			$update_filename = $old_filename;
        		}

        		$data = [
        			//'user_id' => $this->input->post('uid'),
        			'user_name' => $this->input->post('uname'),
        			'user_email' => $this->input->post('email'),
        			//'password' => sha1($this->input->post('password')),
        			'role' => $this->input->post('role'),
        			'DOB' => $this->input->post('dob'),
        			'mobile' => $this->input->post('mobile'),
        			'address' => $this->input->post('address'),	
        			'avataar' => $update_filename
        		];
        		$user = new userModel;
        		$res = $user->updateUser($data, $id);

        		$this->session->set_flashdata('status', 'Data Updated Successfully');
        		redirect(base_url('index.php/users'));

        		// if ($this->db->affected_rows() > 0) {
          //        	echo "<script>alert('Data updated Successfully...!');</script>";
          //    	}
          //    	echo "<script>window.location='".site_url('users')."';</script>";
        }
        else
        {
        	$this->edit($id);
        }
	}

	function user_name_check(){
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE user_name = '$post[uname]' AND user_id != '$post[uid]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('user_name_check',  'This {field} Already exits, Enter another user name');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

	function email_check(){
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE user_email = '$post[email]' AND user_id != '$post[uid]'");
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
    	$user = new userModel;
    	if ($user->checkUserImage($id)) 
    	{
    		$data = $user->checkUserImage($id);
    		//$data->avataar;
    		if (file_exists("./images/avatar/".$data->avataar)) 
    		{
    			unlink("./images/avatar/".$data->avataar);
    		}
    		$user->deleteUser($id);
    		$this->session->set_flashdata('status', 'Record Deleted Successfully');
        	redirect(base_url('index.php/users'));
    	}
    }
    
}

?>
