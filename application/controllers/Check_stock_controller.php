<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_stock_controller extends CI_Controller {

	public function index(){
		$this->load->view('check_remaining_stock');
	}
}