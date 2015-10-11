<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index () {

    $navbar = $this->load->view('_navbar', array (
        'active' => 'welcome'
      ), true);

    $content = $this->load->view('welcome/index', array (
      ), true);

    $this->load->view('_layout', array (
        'title' => '首頁',
        'navbar' => $navbar,
        'content' => $content
      ));
	}
}