<?php
class Friend_model extends CI_Model {

  function __construct(){
    parent::__construct();
  }

  public function create ($user_id, $friend_id) {
    // 新增 friends
    $this->db->insert('friends', array (
        'user_id' => $user_id,
        'friend_id' => $friend_id
      ));
    return $this->db->insert_id();
  }

  public function get_total_by_keyword ($user_id, $keyword = '') {
    if ($keyword) $this->db->like ('users.name', $keyword, 'both');
    $this->db->where ('friends.user_id', $user_id);
    $this->db->join ('users', 'friends.friend_id = users.id');
    $this->db->from ('friends');
    return $this->db->count_all_results ();
  }
  public function get_list_by_offset_limit_by_keyword ($user_id, $offset = 0, $limit = 10, $keyword = '') {
    $this->db->select ('*');
    $this->db->limit ($limit, $offset);
    if ($keyword) $this->db->like ('users.name', $keyword, 'both');
    $this->db->where ('friends.user_id', $user_id);
    $this->db->join ('users', 'friends.friend_id = users.id');
    $this->db->order_by ('friends.id', 'DESC');
    $this->db->from ('friends');
    
    $query = $this->db->get ();
    return $query->result ();
  }
  public function destroy_by_friend_id ($user_id, $friend_id) {
    $this->db->where('user_id', $user_id);
    $this->db->where('friend_id', $friend_id);
    return $this->db->delete('friends');
  }

  public function is_friend ($user_id, $friend_id) {
    $this->db->where ('user_id', $user_id);
    $this->db->where ('friend_id', $friend_id);

    $query = $this->db->get ('friends');
    $users = $query->result ();

    if (count ($users) > 0) {
      return true;
    } else {
      return false;
    }
  }
}