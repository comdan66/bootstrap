<?php
class User_model extends CI_Model {

  function __construct(){
    parent::__construct();
  }

  public function get_user_by_id ($id) {
    // 藉由 user ID 撈出資料
    $this->db->where ('id', $id);

    $query = $this->db->get ('users');
    $users = $query->result ();

    // 因為 users 是陣列，故判斷是否有元素，有的話回傳第一筆
    if (count ($users) > 0) {
      return $users[0];
    } else {
      return null;
    }
  }

  public function create_user ($data) {
    // 新增 user
    $this->db->insert('users', $data);
    return $this->db->insert_id();
  }

  public function get_user_by_account ($account) {
    // 藉由 account 撈出資料
    $this->db->where ('account', $account);

    $query = $this->db->get ('users');
    $users = $query->result ();

    // 因為 users 是陣列，故判斷是否有元素，有的話回傳第一筆
    if (count ($users) > 0) {
      return $users[0];
    } else {
      return null;
    }
  }

  public function get_user_by_account_password ($acc, $psw) {
    // 藉由 account、password 撈出資料
    $this->db->where ('account', $acc);
    $this->db->where ('password', $psw);

    $query = $this->db->get ('users');
    $users = $query->result ();

    // 因為 users 是陣列，故判斷是否有元素，有的話回傳第一筆
    if (count ($users) > 0) {
      return $users[0];
    } else {
      return null;
    }
  }
}