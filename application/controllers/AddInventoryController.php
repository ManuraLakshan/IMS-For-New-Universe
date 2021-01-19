<?php


class AddInventoryController extends CI_Controller
{

	public function getMaterialDetails()
	{
		$id = $this->input->get("id");

		$this->load->model("AddInventoryModel");
		$details = $this->AddInventoryModel->getMaterials($id);
		echo json_encode($details); exit;

	}

	public function loadAddInventoryView()
	{
		$this->load->model("AddInventoryModel");
		$data['type'] = $this->AddInventoryModel->getMaterialType();
		$this->load->view('add_inventory',$data);
	}

	private function genarateStockId()
	{

		return uniqid('STC');

	}



	public function addStockToDatabase()
	{


		$this->load->library('form_validation');



		$this->form_validation->set_rules('materialId', 'Material ID', 'required|alpha_numeric');
		$this->form_validation->set_rules('materialDesc', 'Material Description', 'required');
		$this->form_validation->set_rules('materialColor', 'Material Color', 'required|alpha');
		$this->form_validation->set_rules('materialType', 'Material Type', 'required');
		$this->form_validation->set_rules('materialUnit', 'Material Unit', 'required');
		$this->form_validation->set_rules('arrivalDate', 'Date', 'required');
		$this->form_validation->set_rules('materialQuantity', 'Material Quantity', 'required|numeric');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run())
		{
			$config['upload_path'] = './images/material/';
			$config['allowed_types'] = 'gif|png|jpg|jpeg';

			$this->load->library('upload',$config);

			if($this->upload->do_upload('materialImage'))
			{
				$uploadData = $this->upload->data();
				$image = base_url('images/material/').$uploadData['file_name'];
			}else
			{
				$image = "";
				$upload_error = $this->upload->display_errors();
			}

			$this->load->model('AddInventoryModel');
			$materialData = array(
				"material_id" => $this->input->post("materialId"),
				"material_description" => $this->input->post("materialDesc"),
				"color" => $this->input->post("materialColor"),
				"item_image" => $image,
				"material_name" => $this->input->post("materialType"),
				"material_unit" => $this->input->post("materialUnit"),
				"total_quantity" => $this->input->post("materialQuantity")
			);


			$stockData = array(
				"date" => $this->input->post("arrivalDate"),
				"stock_id" => $this->genarateStockId(),
				"quantity" => $this->input->post("materialQuantity"),
				"material_id" => $this->input->post("materialId")
			);

			$result = $this->AddInventoryModel->insertData($materialData,$stockData,$this->input->post("materialId"),$this->input->post("materialColor"),$this->input->post("materialQuantity"),$this->input->post("materialType"),$this->input->post("materialUnit"));
				if($result == "updated")
				{
					$this->load->model("GlobalMethods");
					$this->GlobalMethods->logger($this->session->userdata('user_name'),"updated inventory");
					redirect("AddInventoryController/updated");
				}
				elseif ($result == "excites")
				{
					redirect("AddInventoryController/alreadyExcites");
				}
				elseif($result == "inserted")
				{
					$this->load->model("GlobalMethods");
					$this->GlobalMethods->logger($this->session->userdata('user_name'),"add inventory");
					redirect("AddInventoryController/inserted");
				}


		}else
		{
			$this->loadAddInventoryView();
		}

	}

	public function inserted(){
		$this->loadAddInventoryView();
	}

	public function updated(){
		$this->loadAddInventoryView();
	}

	public function alreadyExcites(){
		$this->loadAddInventoryView();
	}

}
