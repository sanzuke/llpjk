<form role="form" action="<?php echo base_url() ?>form/save" method="post">
  <div class="col-md-6">
    <div class="form-group">
        <label>Sertifikat Ahli Atas Nama</label>
        <input class="form-control" name="atasnama">
        <!-- <p class="help-block">Example block-level help text here.</p> -->
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat"></textarea>
    </div>

    <div class="form-group">
        <label>NPWP</label>
        <input class="form-control" name="npwp" id="npwp">
    </div>

    <div class="form-group">
        <label>Asosiasi</label>
        <input class="form-control" name="asosiasi">
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <!-- <label>Tambah Klasifikasi</label> -->
      <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Klasifikasi</button>
    </div>
    <!-- <div class="form-group">
      <label>Kode Klasifikasi</label>
        <select class="form-control" name="kodeklasifikasi">
          <option value="">[ Pilih Klasifikasi ]</option>
          <?php
          foreach ($dataklasifikasi->result_array() as $key) {
            echo '<option value="'.$key['kode_klasifikasi'].'">'.$key['subklasifikasi'].' - '.$key['subkualifikasi'].'</option>';
          }
          ?>
        </select>
    </div> -->

    <table class="table">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Subklasifikasi</th>
          <th>Subkualifikasi</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>

  <!-- <div class="form-group input-group">
      <input type="text" class="form-control">
      <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
  </div> -->
  <div class="clearfix"></div>
  <hr>
  <div class="col-md-12 btn-group">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
    <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
  </div>
</form>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Klasifikasi</h4>
      </div>
      <!-- <form role="form" action="<?php echo base_url() ?>klasifikasi/simpan" method="post"> -->
        <div class="modal-body">

          <table class="table">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Subklasifikasi</th>
                <th>Subkualifikasi</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($dataklasifikasi->result_array() as $key) {
                # code...
                $btn = '<div class="btn-group">
                          <button class="btn btn-sm btn-info"><i class="fa fa-plus"></i></button>
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

          <!-- <div class="form-group input-group">
              <input type="text" class="form-control">
              <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
          </div> -->
          <div class="clearfix"></div>
        </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
        <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> -->
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Keluar</button>
      </div>
      <!-- </form> -->
    </div>
  </div>
</div>
