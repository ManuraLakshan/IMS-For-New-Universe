<?php


class AddBomController extends CI_Controller
{
	public function loadAddBomView()
	{

		$data['details'] = $this->addBomToDatabase();
		$this->load->view('add_bom_sample',$data);

	}

	public function getStyleDetails()
	{
		$value = $this->input->get("value");

		$this->load->model("AddBomModel");
		$res = $this->AddBomModel->getStyle($value);
		echo json_encode($res); exit;
	}

	public function addBomToDatabase()
	{

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('style', 'Style ID', 'required');
		$this->form_validation->set_rules('styleName', 'Style Name', 'required');
		$this->form_validation->set_rules('pieces', 'Number of Pieces', 'required');
		$this->form_validation->set_rules('dueDate', 'Due Date', 'required');
		$this->form_validation->set_rules('itemCode[]','Item Code', 'required');
		$this->form_validation->set_rules('unit[]','Unit', 'required');
		$this->form_validation->set_rules('waste[]','Waste', 'required');
		$this->form_validation->set_rules('moq[]','MOQ', 'required');
		$this->form_validation->set_rules('requiredQty[]','Required Quantity', 'required');


		if($this->form_validation->run())
		{
			$style = $this->input->post('style');
			$styleName = $this->input->post('styleName');
			$numberOfPieces = $this->input->post('pieces');
			$dueDate = $this->input->post('dueDate');
			$itemCode = $this->input->post('itemCode[]');
			$unit = $this->input->post('unit[]');
			$waste = $this->input->post('waste[]');
			$moq = $this->input->post('moq[]');
			$requiredQty = $this->input->post('requiredQty[]');


			$styleDataArray = Array(
				"style_id" => $style,
				"style_name" => $styleName,
				"num_of_pieces" => $numberOfPieces,
				"due_date" => $dueDate
			);

			$bomDataArray = Array();

			if(empty($bomDataArray))
			{
				for ($i = 0; $i< sizeof($itemCode);$i++)
				{
					$data = Array("material_id" => $itemCode[$i],"required_qty" => $requiredQty[$i],"style_id" => $style,"unit" => $unit[$i],"waste" => $waste[$i],"moq" => $moq[$i]);
					array_push($bomDataArray,$data);
				}
			}



			$this->load->model('AddBomModel');
			$result =  $this->AddBomModel->insertStyleData($styleDataArray,$style,$styleName,$dueDate,$numberOfPieces,$bomDataArray);

			if($result == "updated")
			{
				$this->load->model("GlobalMethods");
				$this->GlobalMethods->logger($this->session->userdata('user_name'),"updated BOM");
				redirect("AddBomController/updated");
			}
			elseif ($result == "excites")
			{
				redirect("AddBomController/alreadyExcites");
			}
			elseif($result == "inserted")
			{
				$this->load->model("GlobalMethods");
				$this->GlobalMethods->logger($this->session->userdata('user_name'),"Inserted BOM");
				redirect("AddBomController/inserted");
			}else{
				return $result;
			}

		}

	}

	public function inserted(){
		$this->loadAddBomView();
	}

	public function updated(){
		$this->loadAddBomView();
	}

	public function alreadyExcites(){
		$this->loadAddBomView();
	}


}
