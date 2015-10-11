<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {

  public function index ($offset = 0) {

    $limit = 10;
    $total = $this->message_model->get_total ();
    $messages = $this->message_model->get_list_by_offset_limit ($offset, $limit);
    
    $this->load->library ('pagination');
    $config['base_url'] = base_url ('messages/index');
    $config['total_rows'] = $total;
    $config['per_page'] = $limit;

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
        'active' => 'messages'
      ), true);

    $content = $this->load->view('messages/index', array (
      'messages' => $messages,
      'pagination' => $pagination
      ), true);

    $this->load->view('_layout', array (
        'title' => '我的動態',
        'navbar' => $navbar,
        'content' => $content
      ));
  }
  public function message_post () {
    $content = $this->input->post ('content');

    if (!$content) {
      $this->session->set_flashdata ('_message', '填寫的內容有誤');
      return redirect (base_url ('messages/index'));
    }

    if (!user ()) {
      $this->session->set_flashdata ('_message', '您沒有登入');
      return redirect (base_url ('messages/index'));
    }

    $data = array (
        'user_id' => user ()->id,
        'content' => $content,
        'created_at' => date ('Y-m-d H:i:s')
      );

    $message_id = $this->message_model->create ($data);

    if (!$message_id) {
      $this->session->set_flashdata ('_message', '新增失敗');
      return redirect (base_url ('messages/index'));
    }

    $this->session->set_flashdata ('_message', '新增成功');
    return redirect (base_url ('messages/index'));

  }
}