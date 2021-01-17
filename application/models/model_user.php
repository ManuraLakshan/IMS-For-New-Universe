<?php


class model_user extends CI_Model {

    function insertUserdata(){

        $data = array(
            'first_name' => $this->input->post('fname',TRUE),
            'last_name' => $this->input->post('lname',TRUE),
            'user_email' => $this->input->post('email',TRUE),
            'user_password' => sha1($this->input->post('password',TRUE))
        );

        return $this->db->insert('user',$data);
    }

    function LoginUser(){

        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));

        $this->db->where('user_email',$email);
        $this->db->where('user_password',$password);

        $respond  = $this->db->get('user');
        if ($respond->num_rows()==1){
            return $respond->row(0);
            /*print_r($respond);
            die();*/
        }
        else{
            return false;
            /*echo "error";
            die();*/
        }
    }

    public function get($id = null){

        $this->db->from('user');

        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post){

        $params['user_id'] = $post['uid'];
        $params['user_name'] = $post['uname'];
        $params['user_email'] = $post['email'];
        $params['password'] = sha1($post['password']);
        $params['role'] = $post['role'];
        $params['DOB'] = $post['dob'];
        $params['mobile'] = $post['mobile'];
        $params['address'] = $post['address'] != "" ? $post['address'] : null ;
        $params['avataar'] = $post['avataar'];

        $this->db->insert('user',$params);
    }

    public function edit($post){

        // $params['user_id'] = $post['uid'];
        $params['user_name'] = $post['uname'];
        $params['user_email'] = $post['email'];
        $params['role'] = $post['role'];
        $params['DOB'] = $post['dob'];
        $params['mobile'] = $post['mobile'];
        $params['address'] = $post['address'];
        $params['avataar'] = $post['avataar'];

        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $this->db->where('user_id', $post['uid']);
        $this->db->update('user',$params);
    }

    public function del($id)
    {       
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    } 

   
}

?>