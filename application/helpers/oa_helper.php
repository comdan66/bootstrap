<?php

// 此 helper 已經在 application/config/autoload.php 內了

if ( ! function_exists('user')) {
  function user ($user_id = '') {
    // 取得 ci 資源
    $CI =& get_instance ();
    
    // 取得存在 session 內的 user_id
    $user_id = $CI->session->userdata ('user_id');
    
    // 不存在 user_id 的話
    if (!$user_id)
      return null;

    return $CI->user_model->get_user_by_id ($user_id);
  }
}
if ( ! function_exists('user_login')) {
  function user_login ($user_id) {
    // 取得 ci 資源
    $CI =& get_instance ();

    // 設定存入 session 內的 user_id
    $CI->session->set_userdata ('user_id', $user_id, 86500);
    return true;
  }
}