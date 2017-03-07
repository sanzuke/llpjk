<?php
class Core_models extends CI_Model {
      public function __construct()
      {
              // Call the CI_Model constructor
              parent::__construct();
      }

      public function cekLogin($u, $p){
        $q = $this->db->query("SELECT * FROM ss_user WHERE userid = '{$u}' AND password = '{$p}'");
        return $q;
      }

      public function loadMenu()
      {
        $menu = $this->uri->segment(1);

        switch ($menu) {
          case 'form':
            $form = 'class="active"'; $list = ''; $kaslifikasi = ''; $pass=''; $dashboard = '';
            break;
          case 'lists':
            $form = ''; $list = 'class="active"'; $kaslifikasi = ''; $pass=''; $dashboard = '';
            break;
          case 'klasifikasi':
            $form = ''; $list = ''; $kaslifikasi = 'class="active"'; $pass=''; $dashboard = '';
          break;
          case 'ubahpassword':
            $form = ''; $list = ''; $kaslifikasi = ''; $pass='class="active"'; $dashboard = '';
          break;
          default:
            $form = ''; $list = ''; $kaslifikasi = ''; $pass=''; $dashboard = 'class="active"';
            break;
        }
        echo '<ul class="nav navbar-nav side-nav">
            <li '.$dashboard.'>
                <a href="'.base_url().'dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <!-- <li>
                <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
            </li> -->
            <li '.$form.'>
                <a href="'.base_url().'form"><i class="fa fa-fw fa-edit"></i> Formulir</a>
            </li>
            <li '.$list.'>
                <a href="'.base_url().'lists"><i class="fa fa-fw fa-table"></i> Daftar Ahli</a>
            </li>
            <li '.$kaslifikasi.'>
                <a href="'.base_url().'klasifikasi"><i class="fa fa-fw fa-wrench"></i> Tambah Klasifikasi</a>
            </li>
            <li '.$pass.'>
                <a href="'.base_url().'ubahpassword"><i class="fa fa-fw fa-key"></i> Ubah Password</a>
            </li>
            <!-- <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#klasifikasi"><i class="fa fa-fw fa-wrench"></i> Master Data <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="klasifikasi" class="collapse">
                    <li>
                        <a href="#">Tambah Klasifikasi</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#pengaturan"><i class="fa fa-fw fa-gear"></i> Pengaturan <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="pengaturan" class="collapse">
                    <li>
                        <a href="#">Ubah Password</a>
                    </li>
                </ul>
            </li> -->
            <!--<li>
                <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
            </li>
            <li>
                <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
            </li> -->
        </ul>';
      }

      public function loadKlasifikasi()
      {
        $q = $this->db->query("SELECT * FROM ss_klasifikasi");
        return $q;
      }

      public function loadListForm()
      {
        $q = $this->db->query("SELECT sk.*
            FROM cm_sk sk ");
        return $q;
      }

      public function getSK($value)
      {
        if($value != ""){
          // 9faecf3e15e75239708706286f111a10
          $get = $this->db->query("SELECT * FROM cm_sk WHERE link = '{$value}'");
          if( count($get->result_array()) > 0 ){
            return $get->row();
          } else {
            return array("atasnama"=>"", "alamat"=>"","npwp"=>"", "asosiasi"=>"", "Link"=>"");
          }
        } else {
          return array("atasnama"=>"", "alamat"=>"","npwp"=>"", "asosiasi"=>"", "Link"=>"");
        }
      }

      public function getKlasifikasi($value)
      {
        $q = $this->db->query("SELECT dt.kode_klasifikasi, k.subklasifikasi, k.subkualifikasi
          	FROM cm_sk_kla_detil dt,
          		 ss_klasifikasi k
          WHERE dt.kode_klasifikasi = k.kode_klasifikasi
            AND dt.id_sk = {$value}");
        return $q;
      }

      public function saveDetailKla()
      {
        $data = $this->session->userdata("addKlasifikasi");
        $id = $this->db->insert_id();
        $i = 0;
        // print_r($data);
        while($i <= count($data)-1){
          $id_sk = $data[$i];
          $hsl = $this->cekDetilKla($id, $id_sk);
          // echo $hsl;
          if($hsl == 0){
            // echo $data[0];
            $this->db->query("INSERT INTO cm_sk_kla_detil VALUES(NULL, '{$id}', '{$id_sk}')");
          }
          $i++;
        }

      }

      public function cekDetilKla($id='',$value='')
      {
        $q = $this->db->query("SELECT * FROM cm_sk_kla_detil WHERE kode_klasifikasi = '{$value}' AND id_sk = '{$id}'");
        $jml = $q->num_rows();
        return $jml;
      }

      public function deleteAhli($id)
      {
        // $id = $this->input->post("id", true);
        $q = $this->db->delete("cm_sk", array("id"=>$id));
        if($q){
          $qDetil = $this->db->delete("cm_sk_kla_detil", array("id_sk"=>$id));
          return true;
        } else {
          return false;
        }
      }
}
?>
