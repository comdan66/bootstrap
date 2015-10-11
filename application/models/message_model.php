<?php
class Message_model extends CI_Model {

  function __construct(){
    parent::__construct();
  }

  public function create ($data) {
    // 新增 messages
    $this->db->insert('messages', $data);
    return $this->db->insert_id();
  }

  public function get_total () {
    $this->db->from ('messages');
    return $this->db->count_all_results ();
  }
  public function get_list_by_offset_limit ($offset = 0, $limit = 10) {
    $this->db->select ('*');
    $this->db->limit ($limit, $offset);
    $this->db->order_by ('messages.id', 'DESC');
    $this->db->join ('users', 'messages.user_id = users.id');
    $this->db->from ('messages');
    
    $query = $this->db->get ();
    return $query->result ();
  }
  public function all () {
    // 使用 join 合併 messages、users 兩張表
    $this->db->select ('*');
    $this->db->from ('messages');
    $this->db->join ('users', 'messages.user_id = users.id');
    
    $query = $this->db->get ();
    $messages = $query->result ();
    return $messages;
  }
}