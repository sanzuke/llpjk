<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function index()
	{
    $id = $this->uri->segment(2);
    $data['id'] = $id;
    $data['content_page'] = 'dashboard_view';
    $data['title_page'] = 'Dashboard';
		$data['jmlAhli'] = $this->Core_models->getCountAhli();
		$data['jmlKla'] = $this->Core_models->getCountKlasifikasi();
		$this->load->view('template', $data);
  }


}
