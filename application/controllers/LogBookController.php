<?php


class LogBookController extends CI_Controller
{
	function loadLogBookView(){

		$this->load->view('logbook');
	}

	function validateLogBook(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fileName', 'fileName', 'required');
		if($this->form_validation->run())
		{
			$file = $this->input->post("fileName");


		}

	}

	function readme($d){

		$this->load->model("GlobalMethods");
		$data['logdata'] = $this->GlobalMethods->readLogFile($d);
		$this->session->set_tempdata('item', $data['logdata'], 10);

		redirect("LogBookController/loadLogBookView");
	}

}
