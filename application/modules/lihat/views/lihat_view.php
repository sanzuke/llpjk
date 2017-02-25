<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Lalu Lintas P Jasa Ketenagakerjaan">
  <meta name="author" content="ZukeLabs">
  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  <title><?php echo $title_page ?></title>
</head>
<body>
  <div class="container">
    <br><br><br>
    <div class="row">
      <div class="col-md-4 col-lg-3"></div>
      <div class="col-md-4 col-lg-6">
        <div class="panel panel-default">
          <!-- <div class="panel-heading"><h3>Data Tenaga Ahli</h3></div> -->
          <div class="panel-body" align="center">
            SERTIFIKAT KEAHLIAN ATAS NAMA :<br>
            <b><?php echo $atasnama ?></b><br>
            ALAMAT : <br>
            <?php echo $alamat ?><br>
            NPWP : <?php echo $npwp ?><br>
            ASOSIASI : <br>
            <?php echo $asosiasi ?><br><br>
            <table class="table table-striped">
              <thead>
                <tr style="font-size:10px;">
                  <th>KODE SUBKLASIFIKASI</th>
                  <th>SUBKLASIFIKASI</th>
                  <th>SUBKUALIFIKASI</th>
                </tr>
              </thead>
              <tbody>

              </tbody> 
            </table>
            SERTIFIKAT TERDAFTAR DI LPKJ (VALID)<br>
            <?php echo $qrcode ?>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
