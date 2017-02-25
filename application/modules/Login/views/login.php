<html>
<head>
  <!-- <script src="<?php echo base_url() .'assets/js/TweenLite.min.js' ?>"></script> -->
  <script src="<?php echo base_url() .'assets/js/jquery.js' ?>"></script>
  <script src="<?php echo base_url() .'assets/js/bootstrap.js' ?>"></script>
  <script src="<?php echo base_url() .'assets/js/login.js' ?>"></script>
  <link href="<?php echo base_url() .'assets/css/bootstrap.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url() .'assets/css/login.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url() .'assets/css/font-awesome.css' ?>" rel="stylesheet">
  <title>Login Area</title>
</head>
<body>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title"><i class="fa fa-key"></i> Silahkan sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="<?php echo base_url() . 'login/auth' ?>" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Nama Pengguna" name="username" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<!-- <div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div> -->
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
