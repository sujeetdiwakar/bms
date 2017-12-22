<?php 
  include_once "header.php"; 
  include_once "before_login_common.php";
?>
<title>User Login</title>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Book Management System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <?php echo menu("signin"); ?>
    </div>
  </div>
</nav>
 
<body>
<div class="container content_area">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12">
							<h4>User Login</h4>
						</div>
						
					</div>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form id="login-form" action="home.php" method="post" role="form" style="display: block;">
								<div class="form-group">
									<input type="text" name="uid" id="username" tabindex="1" class="form-control" placeholder="Username" value=""  autofocus>
								</div>
								<div class="form-group">
									<input type="password" name="pwd" id="password" tabindex="2" class="form-control" placeholder="Password">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-12">
											<div class="text-center">
												<a href="forgot_password.php" tabindex="5" class="forgot-password">Forgot Password?</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once "footer.php"; ?>	



















	




