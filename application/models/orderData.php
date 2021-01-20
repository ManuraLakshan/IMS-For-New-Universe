<?php

class orderData extends CI_model{

	public function getorderData(){
		
		$getDataQuery = $this->db->query("select * from new_order2");
		return $getDataQuery;

	}
	public function getorderStyle(){


		return $this->input->post('style',TRUE);

	}

	public function getRequests($id){
		$fieldName = "material_id";

		$query = $this->db
			->select('*')
			->from('request')
			->where("$fieldName LIKE '$id%'")
			->get();
		return $query->result_array();
	}

	//  public function getBackupData(){
	// 	$backupDataquery = $this->db->get("material");
	// 	return $backupDataquery;
	// }

	function insertorderData($data){
		return $this->db->insert('new_order2',$data);
//		echo "added";
	}

}



?>
