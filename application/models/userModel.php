<?php

defined('BASEPATH') OR exit('no derict script access allowed');

class userModel extends CI_Model{

        public function getUsers()
        {
                $query = $this->db->get('user');
                return $query->result();
        }
	
	public function insertUser($data)
        {
                return $this->db->insert('user', $data);
        }

        public function editUser($id)
        {
                $query = $this->db->get_where('user', ['user_id' => $id]);
                return $query->row();
        }

        public function updateUser($data, $id)
        {
                return $this->db->update('user', $data, ['user_id' => $id]);
        }

        public function checkUserImage($id)
        {
                $query = $this->db->get_where('user', ['user_id' => $id]);
                return $query->row();
        }

        public function deleteUser($id)
        {
                return $this->db->delete('user', ['user_id' => $id]);
        }
}

?>