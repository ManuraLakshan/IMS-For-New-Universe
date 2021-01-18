<?php


class ViewBomModel extends CI_Model
{
	public function getStyleDetails(){


		$query = $this->db->query("SELECT * FROM style");
		return $result = $query->result();
	}
}
