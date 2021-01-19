<?php


class AddBomModel extends CI_Model
{

	public function getStyle($value)
	{
		$fieldName = "style_id";


		$query2 = $this->db
			->select('*')
			->from('style')
			->where("$fieldName LIKE '$value%'")
			->get();
		$query1= $this->db
			->select('*')
			->from('bom')
			->where("bom.style_id LIKE '%$value%'")
			->get();
		return [$query1->result_array(),$query2->result_array()];

//		return Array("material"=> $query1->result_array(),"style"=>$query2->result_array());
//		return $query2->result_array();
	}

	public function insertStyleData($styleDataArray,$style,$styleName,$dueDate,$numberOfPieces,$bomDataArray)
	{

		$query = $this->db->query("SELECT * FROM `style` WHERE `style_id`=\"$style\" AND `style_name`=\"$styleName\" ");

		if($query->num_rows() > 0){

		$this->db->query("UPDATE style SET num_of_pieces = $numberOfPieces WHERE `style_id`=\"$style\"");

			$insertArray = Array();
			$updateArray = Array();
			foreach ($bomDataArray as $value){
				$materialId = $value["material_id"];
				$styleId = $value["style_id"];
				if(($this->db->query("SELECT material_id FROM bom WHERE EXISTS (SELECT material_id FROM bom WHERE material_id = \"$materialId\" AND style_id = \"$styleId\")"))->num_rows() > 0){
					array_push($updateArray,$value);
				}
				else{
					array_push($insertArray,$value);
				}

			}
			if(!empty($updateArray)){
				$this->db->update_batch("bom",$updateArray,'material_id');
			}
			if(!empty($insertArray)){
				$this->db->insert_batch("bom",$insertArray);
			}

			return "updated";


		}
		elseif ($this->checkForPrimaryKey($styleDataArray["style_id"]))
		{
			return "excites";
		}
		else
		{
			$this->db->insert("style",$styleDataArray);
			$this->db->insert_batch("bom",$bomDataArray);
			return "inserted";

		}


	}

	public function checkForPrimaryKey($key){
		$this->db->select('style_id');
		$this->db->where('style_id',$key);
		$query = $this->db->get('style');
		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}


}
