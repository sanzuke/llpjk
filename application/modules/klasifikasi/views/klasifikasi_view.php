<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Klasifikasi</h4>
      </div>
      <form role="form" action="<?php echo base_url() ?>klasifikasi/simpan" method="post">
        <div class="modal-body">

          <div class="form-group">
              <label>Kode Klasifikasi</label>
              <input class="form-control" name="kode">
              <!-- <p class="help-block">Example block-level help text here.</p> -->
          </div>

          <div class="form-group">
              <label>Subklasifikasi</label>
              <input class="form-control" name="subklasifikasi">
          </div>

          <div class="form-group">
              <label>Subkualifikasi</label>
              <input class="form-control" name="subkualifikasi">
          </div>

          <!-- <div class="form-group input-group">
              <input type="text" class="form-control">
              <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
          </div> -->
          <div class="clearfix"></div>
        </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
      </div>
      </form>
    </div>
  </div>
</div>

<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button><br>
<p class="help-block"><?php echo $message ?></p>
<hr>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Kode</th>
      <th>Subklasifikasi</th>
      <th>Subkualifikasi</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($dataklasifikasi->result_array() as $key) {
      # code...
      $btn = '<div class="btn-group">
                <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                <button class="btn btn-sm btn-danger""><i class="fa fa-times"></i></button>
              </div>';
      echo '<tr>
            <td>'.$key['kode_klasifikasi'].'</td>
            <td>'.$key['subklasifikasi'].'</td>
            <td>'.$key['subkualifikasi'].'</td>
            <td>'.$btn.'</td>
          </tr>';
    }
    ?>
  </tbody>
</table>
