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

	public function auth()
	{
		$u = $this->input->post("username", true);
		$p = $this->input->post("password", true);

		$cek = $this->Core_models->cekLogin($u, $p);
		if( count($cek->result_array()) > 0){
			$this->session->set_flashdata("message", "Login berhasil");
			$this->session->set_userdata("username", $u);
			redirect("dashboard");
		} else {
			$this->session->set_flashdata("message", "Cek kembali user/password anda");
			redirect("login");
		}
	}

	public function logout($value='')
	{
		$this->session->sess_destroy();
		redirect("login");
	}
}
