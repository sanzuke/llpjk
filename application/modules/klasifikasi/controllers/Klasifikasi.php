<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends MX_Controller {

	public function index()
	{

		$cekUserLogin = $this->session->userdata("username");

		if( !isset($cekUserLogin) )
			redirect("login");

    $data['content_page'] = 'klasifikasi_view';
		$data['title_page'] = 'Tambah Klasifikasi';
		$data['message'] = $this->session->flashdata("message");

		$data['dataklasifikasi'] = $this->Core_models->loadKlasifikasi();
		$this->load->view('template', $data);
	}

	public function simpan()
	{
		$kode 					= $this->input->post("kode", true);
		$subklasifikasi = $this->input->post("subklasifikasi", true);
		$subkualifikasi = $this->input->post("subkualifikasi", true);

		$q = $this->db->query("INSERT INTO ss_klasifikasi VALUES(NULL, '{$kode}', '{$subklasifikasi}','{$subkualifikasi}')");
		if($q){
			$this->session->set_flashdata("message", "<span class='label label-success'>Data telah disimpan</span>");
		} else {
			$this->session->set_flashdata("message", "<span class='label label-danger'>Data gagal disimpan</span>");
		}

		redirect("klasifikasi");
	}

}
