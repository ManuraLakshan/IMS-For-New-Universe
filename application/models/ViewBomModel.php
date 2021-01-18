<?php


class ViewBomModel extends CI_Model
{
	public function getStyleDetails(){


		$query = $this->db->query("SELECT * FROM style");
		return $result = $query->result();
	}

	public function remove($id,$style){
		$query = $this->db->query("SELECT * FROM bom where bom.material_id = \"$id\" AND bom.style_id = \"$style\"");
		if($query->num_rows() > 0){
			$this->db->query("DELETE FROM bom WHERE bom.material_id = \"$id\" AND bom.style_id = \"$style\"");
		}
	}
}
