<?php

class backupData extends CI_model{

	public function getbackupData(){
		
		$getDataQuery = $this->db->query("select * from backup_materials");
		return $getDataQuery;

	}
}