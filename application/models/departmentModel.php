<?php

defined('BASEPATH') OR exit('no derict script access allowed');

class departmentModel extends CI_Model{

	public function getDeparments()
	{
		$query = $this->db->get('department');
        return $query->result();
	}

	public function insertDepartment($data)
	{
		return $this->db->insert('department', $data);
	}

	public function editDepartment($id)
    {
        $query = $this->db->get_where('department', ['dep_id' => $id]);
        return $query->row();
    }

    public function updatetDepartment($data, $id)
   	{
        return $this->db->update('department', $data, ['dep_id' => $id]);
    }

    public function deleteDepartment($id)
        {
                return $this->db->delete('department', ['dep_id' => $id]);
        }
}
?>