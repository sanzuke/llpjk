<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	public function index()
	{
    $id = $this->uri->segment(2);
    $data['id'] = $id;
    $data['title_page'] = 'Ubah Password';
		$this->load->view('login', $data);
  }
}
