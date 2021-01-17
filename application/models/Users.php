<?php


class Users extends CI_Model
{

	function user_request(){
		$data = array(
			'user_name' => $this->input->post('request_user_name'),
			'email' => $this->input->post('request_email'),
			'role' => $this->input->post('user_type'),
			'status' => 1,
		);

		//print_r($data);
		return $this->db->insert('user_requests',$data);


	}





}
