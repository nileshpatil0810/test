<?php
class Form_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function auth_check($data)
    {
        $query = $this->db->get_where('users', $data);
        if($query){   
            return array('code' => "1", "msg" => "Login Successfully", "data" => $query->row());
        }else{
            return array('code' => "0", "msg" => "Something went wrong.");
        }
    }
    public function insert_user($data)
    {   
        $query = $this->db->get_where('users', array('email'=>$data['email'])); 
        $count_data = $query->num_rows();      
        if($count_data == 0){
            $insert = $this->db->insert('users', $data);
            if ($insert) {
                //$this->db->insert_id();
                return array('code' => "1", "msg" => "Registered Successfully.", "user_id" => $this->db->insert_id());
            } else {
                return array('code' => "0", "msg" => "Something went wrong.");
            }
        }else{
            return array('code' => "0", "msg" => "Account already exist.");
        }
        
    }
}