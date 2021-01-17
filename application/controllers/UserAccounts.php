<?php


class UserAccounts extends CI_Controller
{
	public function UserAdmin(){
		$this->load->view('view_inventory');
	}
	public function UserStaff(){
		$this->load->view('index');
	}
}
