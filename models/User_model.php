<?php
class User_model extends CI_model{
  
    public function __construct()
    {
        $this->load->database();
    }

    public function get_items($search,$page,$user_id){
     if(!empty($search)){
          $this->db->like('title', $search);
          $this->db->or_like('description', $search); 
       }
       $this->db->limit(5, (($page-1) * 5));
       //$query = $this->db->get("items");
       $query = $this->get_where('items', array('user_id' => $user_id));
       $query1 = $this->db->query('SELECT * FROM items WHERE user_id = '.$user_id.'');
       $num_data = $query1->num_rows();
       return array("data"=> $query->result(), "total" => $num_data);
   }

   public function insert($table_name,$data){
      $this->db->insert($table_name, $data);
      $id = $this->db->insert_id();
      return $q = $this->get_where($table_name, array('id' => $id));
   }

   public function get_where($table_name,$data){
      return $q = $this->db->get_where($table_name, $data);
   }

   public function get_data($table_name){
      return $q = $this->db->get($table_name);
   }

   public function edit($table_name, $data, $where) {
      $this->db->update($table_name, $data, $where);
      return $q = $this->get_where($table_name, $where);
    }

   public function delete($table, $where) {
        return $this->db->delete($table, $where);
    }
}
?>