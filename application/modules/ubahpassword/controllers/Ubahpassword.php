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

	public function save()
	{
		$pasLama = $this->input->post("passwordlama", true);
		$pasBaru = $this->input->post("passwordbaru", true);
		$pasBaru2 = $this->input->post("passwordbaru2", true);

		$status = 0;

		if( md5($pasLama) != md5($this->session->userdata("password")) ){
			$this->session->set_flashdata("message", "<div class='alert alert-danger'><strong>Gagal!</strong> Password lama tidak sesuai</div>");
			$status = 1;
		} else {
			$status = 0;
		}

		if( $pasBaru != $pasBaru2){
			$this->session->set_flashdata("message", "<div class='alert alert-danger'><strong>Gagal!</strong> Password baru tidak sama</div>");
			$status = 1;
		} else {
			$status = 0;
		}

		if($status == 0 ){
			$q = $this->db->query("UPDATE ss_user SET password = '{$pasBaru}' WHERE userid = 'admin'");
			if($q){
				$this->session->set_flashdata("message", "<div class='alert alert-success'><strong>Berhasil!</strong> Data telah diubah {$id}</div>");
				redirect("ubahpassword");
			} else {
				$this->session->set_flashdata("message", "<div class='alert alert-danger'><strong>Gagal!</strong> Data gagal diubah</div>");
			}
		}
	}

}
