<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends MX_Controller {

	public function index()
	{

		$cekUserLogin = $this->session->userdata("username");

		if( !isset($cekUserLogin) )
			redirect("login");

		$this->session->unset_userdata("addKlasifikasi");
		$this->loadDataKlasifikasiSession();

    $data['content_page'] = 'form_view';
		$data['title_page'] = 'Formulir Input Tenaga Ahli Baru';
		$data['dataklasifikasi'] = $this->Core_models->loadKlasifikasi();
		$data['url'] = base_url();
		$this->load->view('template', $data);
	}

	public function save()
	{
		$an = strtoupper($this->input->post("atasnama", true));
		$alamat = strtoupper($this->input->post("alamat", true));
		$npwp = $this->input->post("npwp", true);
		$asosiasi = strtoupper($this->input->post("asosiasi", true));
		$created_by = $this->session->userdata("username");
		$created_date = date("Y-m-d H:i:s");
		$linkCode = md5($an.$npwp.$created_date);

		$save  = $this->db->query("INSERT INTO cm_sk VALUES(NULL, '{$an}','{$alamat}','{$npwp}','{$asosiasi}','1','{$linkCode}','{$created_by}','{$created_date}')");

		if($save){
			$this->session->set_flashdata("message", "<span class='label label-success'>Data telah disimpan</span>");
			$this->Core_models->saveDetailKla();
			redirect("lists");
		} else {
			$this->session->set_flashdata("message", "<span class='label label-danger'>Data gagal disimpan</span>");
		}
	}

	public function addklasifikasi()
	{
		$value = $this->input->get("id", true);

		$add = $this->session->userdata("addKlasifikasi");
		// $isi = ''; $tmp ='';
		if(is_array($add) ) { //$used_questions = array();
			// $used_questions[] = array($value);
			array_push($add, $value);
			$this->session->set_userdata('addKlasifikasi',$add);
		} else {
			$arr = array($value);
			$this->session->set_userdata('addKlasifikasi', $arr);
		}
		// print_r( $this->session->userdata("addKlasifikasi") );
		$this->loadDataKlasifikasiSession();
	}

	public function loadDataKlasifikasiSession()
	{
		# code...
		// $kla = explode( ",", $this->session->userdata("addKlasifikasi") );
		$i = 0; $isi =""; $data = array();
		$dt = $this->session->userdata("addKlasifikasi");
		if( count($dt) > 0){
			// while($i <= count($data) ){
			$isi = implode(",", $dt);
			$q = $this->db->query("SELECT * FROM ss_klasifikasi WHERE kode_klasifikasi IN ({$isi})");
			foreach ($q->result_array() as $key) {
				$rec['kode_klasifikasi'] = $key['kode_klasifikasi'];
				$rec['subklasifikasi'] = $key['subklasifikasi'];
				$rec['subkualifikasi'] = $key['subkualifikasi'];
				$data[] = $rec;
			}
		}
		// header('Content-type: application/json');
		// header('Access-Control-Allow-Origin: *');
		// echo count($kla);
		echo json_encode($data);
	}

	public function delKlaSess()
	{
		$idx = $this->input->get("id", true);
		$dt = $this->session->userdata("addKlasifikasi");
		unset($dt[$idx]);
		$this->session->set_userdata("addKlasifikasi",$dt);

		$this->loadDataKlasifikasiSession();
	}

}
