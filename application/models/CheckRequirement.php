<?php

class CheckRequirement extends CI_Model{

	public function get_Bom(){

		$sql1 = "SELECT * FROM bom";

		$query2=$this->db->query($sql1);
		if($query2->num_rows() > 0){
			return  $query2->result();
		}
	}

	public function get_stock(){
		$query1=$this->db->get('stock');
		if($query1->num_rows() > 0){
			return $query1->result();
		}
	}

	public function get_Bom_M_ID(){
		$sql2 ="SELECT `material_id`,`required_qty` FROM `bom`";
		$mat_id="SELECT `material_id`FROM `bom`";

		$query3=$this->db->query($sql2);
		return $query3->result();
	}

	public function get_style(){
		$sql3 ="SELECT `style_name` FROM `style`";
		$query4=$this->db->query($sql3);
		return $query4->result();
	}

	public function get_quantity(){
		$sql4 ="SELECT * from bom b,material m WHERE b.material_id=m.material_id AND (b.is_issued='0' OR b.is_issued='3')";
		$query5=$this->db->query($sql4);
		return $query5->result();
	}

	public function load_quantity(){
		$sql4 ="SELECT * from bom b,material m WHERE b.material_id=m.material_id AND b.is_issued='2'";
		$query5=$this->db->query($sql4);
		return $query5->result();
	}

	public function ready_take($quantity,$id,$bom_id){

		// $sql5="Update material set total_quantity=total_quantity-$quantity WHERE material_id='$id'";

		$sql6="Update bom set is_issued='2' WHERE bom_id='$bom_id'";
		//$query6=$this->db->query($sql5);
		$query7=$this->db->query($sql6);
		return $query7;
	}

	public function reduas_quantity($id,$quantity,$bom_id){

		$sql5="Update material set total_quantity=total_quantity-$quantity WHERE material_id='$id'";

		$sql6="Update bom set is_issued='1' WHERE bom_id='$bom_id'";
		
		$query6=$this->db->query($sql5);
		$query7=$this->db->query($sql6);
		
		return $query6.$query7;
	}

	public function request_quantity($material_id,$required_qty,$total_quantity,$bom_id,$style_id){

		$request_qty = $required_qty-$total_quantity;
		$available_qty = $total_quantity-$request_qty;
		$sql5="INSERT INTO `request`(`material_id`, `quentity`,`bom_id`) VALUES ('$material_id','$request_qty','$bom_id')";
		// $sql = "INSERT INTO `bom`(`bom_id`, `material_id`, `required_qty`, `style_id`, `is_issued`) VALUES ('$bom_id', '$material_id', $available_qty, '$style_id', 0)";
		$sql6="Update bom set `required_qty` = '$required_qty', is_issued='3' WHERE bom_id='$bom_id'";
		$query7=$this->db->query($sql5);
		// $query=$this->db->query($sql);
		$query8=$this->db->query($sql6);
		
		// return $query.$query7.$query8;
		return $query7.$query8;
		//return $quantity;
	}

	public function get_requset(){
		$sql7="SELECT `bom_id`,`material_id`,`quentity` FROM `request`";
		$query8=$this->db->query($sql7);
		return $query8->result();
	}
}
?>
