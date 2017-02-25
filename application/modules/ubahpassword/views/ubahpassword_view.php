<form role="form" action="<?php echo base_url() ?>ubahpassword/save" method="post">
  <div class="col-md-6">
    <div class="form-group">
        <label>Password Lama</label>
        <input class="form-control" name="passwordlama">
        <!-- <p class="help-block">Example block-level help text here.</p> -->
    </div>

    <div class="form-group">
        <label>Password Baru</label>
        <input class="form-control" name="passwordbaru">
        <!-- <p class="help-block">Example block-level help text here.</p> -->
    </div>

    <div class="form-group">
        <label>Password Baru Lagi</label>
        <input class="form-control" name="passwordbaru2">
        <!-- <p class="help-block">Example block-level help text here.</p> -->
    </div>

    <div class="form-group btn-group">
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
      <!-- <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button> -->
    </div>
  </div>
</form>
