<?php


class view_db extends CI_Model
{
	function DisplayInventoryFabric(){
		$response=$this->db->query("SELECT * FROM `material` a,`stock` b where a.`material_id`=b.`material_id` and a.`material_id` like '%Fab%'");
		if ($response){
			return $response;

			die();
		}else{
			echo "error";
			die();

		}
	}

}
