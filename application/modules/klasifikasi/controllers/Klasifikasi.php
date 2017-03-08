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

		$cek = $this->db->query("SELECT * FROM ss_klasifikasi WHERE kode_klasifikasi = '{$kode}' ");
		$jml = $cek->num_rows();
		if( $jml > 0 ){
			$q = $this->db->query("UPDATE ss_klasifikasi SET subklasifikasi = '{$subklasifikasi}', subkualifikasi = '{$subkualifikasi}' WHERE kode_klasifikasi = '{$kode}'");
		} else {
			$q = $this->db->query("INSERT INTO ss_klasifikasi VALUES(NULL, '{$kode}', '{$subklasifikasi}','{$subkualifikasi}')");
		}
		if($q){
			$this->session->set_flashdata("message", "<div class='alert alert-success'><strong>Berhasil!</strong> Data telah disimpan</div>");
		} else {
			$this->session->set_flashdata("message", "<div class='alert alert-danger'><strong>Gagal!</strong> Data gagal disimpan</div>");
		}

		redirect("klasifikasi");
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$q = $this->db->delete("ss_klasifikasi", array("no"=>$id));
		if($q){
			$this->session->set_flashdata("message", "<span class='label label-success'>Data telah dihapus</span>");
		} else {
			$this->session->set_flashdata("message", "<span class='label label-danger'>Data gagal dihapus</span>");
		}

		redirect("klasifikasi");
	}

}
