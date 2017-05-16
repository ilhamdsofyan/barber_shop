<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title><?=$title?></title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dist/css/sb-admin-2.min.css" />
	<link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/images/baper.png"/>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="document.getElementById('username').focus()">

	<section class="container">
		<section class="login-form">
			<form method="post" action="<?=site_url('login/aksilogin')?>" role="login">

				<br><br><br><br>

				<input type="text" name="username" id="username" placeholder="Username" required class="form-control input-lg" autocomplete="off" />
				<input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
				
				<button type="submit" name="go" class="btn btn-lg btn-block btn-primary">Sign in</button>
			</form>
		</section>
	</section>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>