<?php $this->Core_models->getMessage() ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Atas Nama /Alamat</th>
      <!-- <th>Alamat</th> -->
      <th>NPWP</th>
      <th>Asosiasi</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if( count( $listform->result_array() ) > 0 ){
      foreach ($listform->result_array() as $key) {
        # code...
        $btn = '<div class="btn-group">
                  <a class="btn btn-sm btn-info" href="'.base_url() . 'form/edit/'.$key['id'].'"><i class="fa fa-edit"></i></a>
                  <button class="btn btn-sm btn-danger" data-id="'.$key['id'].'"><i class="fa fa-times"></i></button>
                  <a href="'.base_url().'qr/generateqrcode/'.$key['Link'].'" target="_blank" class="btn btn-sm btn-default"><i class="fa fa-qrcode"></i></a>
                </div>';
        echo '<tr>
              <td><b>'.$key['atasnama'].'</b><br>'.$key['alamat'].'</td>
              <td>'.$key['npwp'].'</td>
              <td>'.$key['asosiasi'].'</td>
              <td>'.$btn.'</td>
            </tr>';
      }
    } else {
      echo '<tr><td colspan="6"><center>Data kosong</center></td></tr>';
    }
    ?>
  </tbody>
</table>
<script>
  $(document).ready(function(){
    $(".btn-danger").click(function(){
      var id = $(this).attr("data-id");
      var psn = confirm("Anda yakin akan menghapus data?");
      if(psn){
        window.location = '<?php echo base_url() ?>lists/delete/'+id;
      }
    })
  })
</script>
