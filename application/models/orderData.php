<?php

class orderData extends CI_model{

	public function getorderData(){
		
		$getDataQuery = $this->db->query("select * from new_order2");
		return $getDataQuery;

	}

	//  public function getBackupData(){
	// 	$backupDataquery = $this->db->get("material");
	// 	return $backupDataquery;
	// }

	function insertorderData(){

		
		$data = array(

			'material_name' => $this->input->post('material_name',TRUE),
			'gate_pass_no' => $this->input->post('gatepass',TRUE),
			'style' => $this->input->post('style',TRUE),
			'material_id' => $this->input->post('material_id',TRUE),
			'sample_name' => $this->input->post('sample_name',TRUE),
			'sample_details' => $this->input->post('sample_details',TRUE),
			'color' => $this->input->post('color',TRUE),
			'roll_no' => $this->input->post('rollNo',TRUE),
			'required_qty' => $this->input->post('required_qty',TRUE),
			'description' => $this->input->post('description',TRUE)

			);

		return $this->db->insert('new_order2',$data);
		echo "added";
	}

}



?>
