<table class="table table-striped">
  <thead>
    <tr>
      <th>Atas Nama</th>
      <th>Alamat</th>
      <th>NPWP</th>
      <th>Asosiasi</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if( count( $listform->result_array() ) > 0 ){
      foreach ($listform->result_array() as $key) {
        # code...
        $btn = '<div class="btn-group">
                  <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-sm btn-danger""><i class="fa fa-times"></i></button>
                </div>';
        echo '<tr>
              <td>'.$key['atasnama'].'</td>
              <td>'.$key['alamat'].'</td>
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
