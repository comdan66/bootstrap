<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

  public function index () {
    $keyword = $this->input->get ('keyword');
    $offset = ($offset = $this->input->get ('per_page')) ? $offset : 0;

    $limit = 10;
    $total = $this->user_model->get_total_by_keyword (user () ? user ()->id : 0, $keyword);
    $users = $this->user_model->get_list_by_offset_limit_by_keyword (user () ? user ()->id : 0, $offset, $limit, $keyword);

    foreach ($users as $user) {
        $user->is_friend = $this->friend_model->is_friend (user () ? user ()->id : 0, $user->id);
    }

    $this->load->library ('pagination');
    $config['base_url'] = base_url ('users/index/?' . ($keyword ? 'keyword=' . $keyword : ''));
    $config['total_rows'] = $total;
    $config['per_page'] = $limit;
    $config['page_query_string'] = true;
    $config['use_page_numbers'] = true;

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';

    $config['first_link'] = '第一頁';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';

    $config['prev_link'] = '上一頁';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['next_link'] = '下一頁';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['last_link'] = '最後頁';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $this->pagination->initialize ($config); 
    $pagination = $this->pagination->create_links ();

    $navbar = $this->load->view('_navbar', array (
        'page' => 'users',
        'keyword' => $keyword
      ), true);

    $content = $this->load->view('users/index', array (
      'users' => $users,
      'pagination' => $pagination
      ), true);

    $this->load->view('_layout', array (
        'title' => '所有使用者',
        'navbar' => $navbar,
        'content' => $content
      ));
  }
  public function bind ($friend_id = 0) {
    if (!user ()) {
      $this->session->set_flashdata ('_message', '請先登入');
      return redirect (base_url ('users'));
    }

    $id = $this->friend_model->create (user ()->id, $friend_id);
    if (!$id) {
        $this->session->set_flashdata ('_message', '加入好友失敗');
        return redirect (base_url ('users'));   
    }
    $this->session->set_flashdata ('_message', '加入好友成功');
    return redirect (base_url ('users'));   
  }
  public function unbind ($friend_id = 0) {
    if (!user ()) {
      $this->session->set_flashdata ('_message', '請先登入');
      return redirect (base_url ('users'));
    }

    $this->friend_model->destroy_by_friend_id (user ()->id, $friend_id);

    $this->session->set_flashdata ('_message', '刪除好友成功');
    return redirect (base_url ('users'));
  }
}