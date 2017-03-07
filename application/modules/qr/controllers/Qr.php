<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends MX_Controller {

	public function index()
	{
    $id = $this->uri->segment(2);
    $data['id'] = $id;
    $data['title_page'] = 'Ubah Password';
		$this->load->view('lihat_view', $data);
  }

  public function id($value='')
  {
    $id = $this->uri->segment(3);
    $brs = $this->Core_models->getSK($id);
    $data['id'] = $brs->id;
    $data['title_page'] = 'Partner - '.$brs->atasnama;
    $data['atasnama'] = $brs->atasnama;
    $data['alamat'] = $brs->alamat;
    $data['npwp'] = $brs->npwp;
		$data['asosiasi'] = $brs->asosiasi;
		$data['kode'] = $brs->Link;
		$link = base_url().'lihat/partner/'.$brs->Link;

		$params['data'] = $link;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'tes.png';
		$this->ciqrcode->generate($params);

		$data['klasifikasi'] = $this->Core_models->getKlasifikasi($brs->id);

    $data['qrcode'] = '<img src="'.base_url().'tes.png" class="thumbnail img-responsive" />';

		$this->load->view('lihat_view', $data);
  }

  public function generateqrcode()
  {
    $id = $this->uri->segment(3);
    $brs = $this->Core_models->getSK($id);

    header("Content-Type: image/png");
		$link = base_url().'qr/id/'.$brs->Link;

    $qr['data'] = $link; //'Selamat Datang di http://h4nk.blogspot.com';

    $this->ciqrcode->generate($qr);
  }

}
