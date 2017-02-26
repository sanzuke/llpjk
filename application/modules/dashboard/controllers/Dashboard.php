<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function index()
	{
    $id = $this->uri->segment(2);
    $data['id'] = $id;
    $data['content_page'] = 'dashboard_view';
    $data['title_page'] = 'Dashboard';
		$this->load->view('template', $data);
  }

}
