<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends MX_Controller {

	public function index()
	{

		$cekUserLogin = $this->session->userdata("username");

		if( !isset($cekUserLogin) )
			redirect("login");

    $data['content_page'] = 'form_view';
		$data['title_page'] = 'Formulir Input Tenaga Ahli Baru';
		$data['dataklasifikasi'] = $this->Core_models->loadKlasifikasi();
		$this->load->view('template', $data);
	}

	public function save()
	{
		$an = $this->input->post("atasnama", true);
		$alamat = $this->input->post("alamat", true);
		$npwp = $this->input->post("npwp", true);
		$asosiasi = $this->input->post("asosiasi", true);
		$created_by = $this->session->userdata("username");
		$created_date = date("Y-m-d H:i:s");
		$linkCode = md5($an.$npwp.$created_date);

		$save  = $this->db->query("INSERT INTO cm_sk VALUES(NULL, '{$an}','{$alamat}','{$npwp}','{$asosiasi}','1','{$linkCode}','{$created_by}','{$created_date}')");

		if($save){
			$this->session->set_flashdata("message", "<span class='label label-success'>Data telah disimpan</span>");
			redirect("lists");
		} else {
			$this->session->set_flashdata("message", "<span class='label label-danger'>Data gagal disimpan</span>");
		}
	}

}
