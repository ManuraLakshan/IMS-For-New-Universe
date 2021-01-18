<?php


class AddInventoryModel extends CI_Model
{

	public function insertData($materialData, $stockData,$materialId, $materialColor,$stockQuantity,$materialType,$materialUnit)
	{

		$query = $this->db->query("SELECT * FROM `material` WHERE `material_id`=\"$materialId\" AND `color`=\"$materialColor\" AND `material_name`=\"$materialType\" AND `material_unit`=\"$materialUnit\"");
		if($query->num_rows() > 0){

			$this->db->query("UPDATE material SET total_quantity = total_quantity + $stockQuantity WHERE `material_id`=\"$materialId\"");
			if($materialData["item_image"] !== ""){
				$imagePath = $materialData["item_image"];
				$this->db->query("UPDATE material SET item_image = \"$imagePath\" WHERE `material_id`= \"$materialId\"");
			}
			$this->db->insert("stock",$stockData);
			return "updated";
		}
		elseif ($this->checkForPrimaryKey($materialId))
		{
			return "excites";
		}
		else
		{
			$this->db->insert("material",$materialData);
			$this->db->insert("stock",$stockData);

			return "inserted";

		}


	}

	public function checkStockExistence($stockId,$date,$materialId){
		$query = $this->db->query("SELECT * FROM stock WHERE stock_id = \"$stockId\" AND stock.date = \"$date\" AND stock.material_id = \"$materialId\"");
		return $query->num_rows();
	}

	public function checkForPrimaryKey($key){
		$this->db->select('material_id');
		$this->db->where('material_id',$key);
		$query = $this->db->get('material');
		$data = $query->row();
		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	public function getMaterialType(){
		$qurey = $this->db->get('materialType');
		return $qurey;
	}

	public function getMaterials($id)
	{
		$fieldName = "material_id";
		$query = $this->db
			->select('*')
			->from('material')
			->where("$fieldName LIKE '$id%'")
			->get();
		return $query->result_array();
	}

}
