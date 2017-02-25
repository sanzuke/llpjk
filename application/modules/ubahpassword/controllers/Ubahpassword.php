<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubahpassword extends MX_Controller {

	public function index()
	{
    $cekUserLogin = $this->session->userdata("username");

		if( !isset($cekUserLogin) )
			redirect("login");

    $data['content_page'] = 'ubahpassword_view';
		$data['title_page'] = 'Ubah Password';
		$data['message'] = $this->session->flashdata("message");

		$this->load->view('template', $data);
  }

}
