<?php


class StockItems extends CI_Model
{
	// item categarize and display in view

	function fetch_Fabric_data(){
		$fabricQuery1 = $this->db->query("SELECT * FROM `material`  GROUP BY `material_name`");

		return $fabricQuery1;
	}

	// item add to damaged inventory

	function add_damaged_items(){
		$data = array(
			'damage_qty' => $this->input->post('stock_quantity'),
			'material_id' => $this->input->post('meterial_id'),
			'material_name' => $this->input->post('meterial_type'),
			'Date' => $this->input->post('date'),
		);
		$result = $this->db->query("SELECT `total_quantity` FROM `material` WHERE `material_id`='FAB01'")->result();
		//$updateCurrentQuantity_dmg=$this->db->query("UPDATE `material` SET = $currentStock_dmg WHERE `material_id` = {$_POST['meterial_id']} ");
		$this->db->set('total_quantity',$result[0]->total_quantity-$_POST['stock_quantity']);
		$this->db->where('material_id' ,$_POST['meterial_id']);
		$this->db->update('material');
		return $this->db->insert('damagestock',$data);
	}

	//item display from damaged inventory

	function View_Damaged_Goods(){
		$Damaged_Goods = $this->db->query("SELECT * FROM `damagestock`");

		return $Damaged_Goods;

	}

	// overall items display
	//"SELECT  `quantity`,`material_description`,`color`,`material_name`,`date` FROM `material` m, `stock` s WHERE m.`material_id`=s.`material_id`  GROUP BY m.`material_id`"

	function View_overall_items(){
		$OverallItems = $this->db->query("SELECT * FROM `material` m, `stock` s WHERE m.`material_id`=s.`material_id` GROUP BY s.`stock_id`");
		return $OverallItems;
	}


	function Login_user(){


		$username = $this->input->post('user_name');
		$password = sha1($this->input->post('pwd'));

		$this->db->where('user_name',$username);
		$this->db->where('password',$password);

		$respond = $this->db->get('user');
		if($respond->num_rows() == 1){
			return $respond->row(0);

		}else{
			return false;
		}
	}
	public function userDataCheck($userId){

		$query=$this->db->query("SELECT * FROM user_requests WHERE id = \"$userId\"");
//		$query = $this->db
//			->select('*')
//			->from('user')
//			->where("$fieldName = '$userId'")
//			->get();
		return $query->result_array();
	}
	public function userRequestUpdate($userId){

		$this->db->query("UPDATE user_requests SET status = 0 WHERE `id`=\"$userId\"");
	}



}
