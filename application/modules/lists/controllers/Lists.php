<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends MX_Controller {

	public function index()
	{

		$cekUserLogin = $this->session->userdata("username");

		if( !isset($cekUserLogin) )
			redirect("login");

    $data['content_page'] = 'list_view';
		$data['title_page'] = 'Daftar Tenaga Ahli';
		$data['listform'] = $this->Core_models->loadListForm();
		$this->load->view('template', $data);
	}

}
