<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Platform extends CI_Controller {

  public function logout () {
    // 如果不是登入狀態的話
    if (!user ())
      return redirect (base_url ());

    // 設定登出
    user_login (0); // 參考 application/helpers/oa_helper.php

    $this->session->set_flashdata ('_message', '登出成功');
    return redirect (base_url ());
  }
  public function login () {
    // 如果已經登入的話 導至首頁
    if (user ())
      return redirect (base_url ());

    $navbar = $this->load->view('_navbar', array (
        'active' => 'login'
      ), true);

    $content = $this->load->view('platform/login', array (
      ), true);

    $this->load->view('_layout', array (
        'title' => '會員登入',
        'navbar' => $navbar,
        'content' => $content
      ));

  }
  public function login_post () {
    // 如果已經登入的話 導至首頁
    if (user ())
      return redirect (base_url ());

    $account = $this->input->post ('account');
    $password = $this->input->post ('password');

    if (!($account && $password)) {
      $this->session->set_flashdata ('_message', '填寫資料有缺');
      return redirect (base_url ('platform/login'));
    }
    $user = $this->user_model->get_user_by_account_password ($account, $password);
    
    if (!$user) {
      $this->session->set_flashdata ('_message', '登入失敗');
      return redirect (base_url ('platform/login'));
    }
    user_login ($user->id);

    $this->session->set_flashdata ('_message', '登入成功');
    return redirect (base_url ());
  }
  public function register () {
    // 如果已經登入的話 導至首頁
    if (user ())
      return redirect (base_url ());

    $navbar = $this->load->view('_navbar', array (
        'active' => 'register'
      ), true);

    $content = $this->load->view('platform/register', array (
      ), true);

    $this->load->view('_layout', array (
        'title' => '帳號註冊',
        'navbar' => $navbar,
        'content' => $content
      ));
  }
  public function register_post () {
    // 如果已經登入的話
    if (user ())
      return redirect ();

    // 取得 post 過來的資料
    $name = $this->input->post ('name');
    $account = $this->input->post ('account');
    $password = $this->input->post ('password');
    $re_password = $this->input->post ('re_password');

    if (!($name && $account && $password && $re_password)) {
      $this->session->set_flashdata ('_message', '填寫資料有缺');
      return redirect (base_url ('platform/register'));
    }

    if ($password !== $re_password) {
      $this->session->set_flashdata ('_message', '密碼確認錯誤');
      return redirect (base_url ('platform/register'));
    }

    // 進資料庫 藉由 account 比對是否有該 user
    $user = $this->user_model->get_user_by_account ($account);

    // 因為用 account 去取資料庫，有該筆資料，代表帳號重複
    if ($user) {
      $this->session->set_flashdata ('_message', '帳號重複');
      return redirect (base_url ('platform/register'));
    }
    
    // 新增使用者
    $data = array (
        'name' => $name,
        'account' => $account,
        'password' => $password
      );

    $user_id = $this->user_model->create_user ($data);

    if ($user_id) {
      $this->session->set_flashdata ('_message', '註冊成功，快登入吧！');
      return redirect (base_url ('platform/login'));
    }
  }
}