<?php
	include_once "before_login_common.php";
	
	if($caller=="self")
	{
		$errors=array();
		if(empty($user_name))
			$errors[user_name]="Empty";
		if(empty($errors))
		{
			$q="select *from user where user_name='$user_name'";
			$newpass=rand(1000,99999);
			$headers = 'From: <bookmanagement@gmail.com>' . "\r\n";
			//echo $newpass;
			$qr=mysqli_query($conn, $q);
			$count=mysqli_num_rows($qr);
			if($count==1)
			{
				$r=mysqli_fetch_object($qr);
				$id=$r->id;
				$email=$r->email;
				$q="update user set pass=PASSWORD('$newpass') where id='$id'";
				mysqli_query($conn, $q) or die($q);
				mail($email,"Your New Passwor",$newpass,$headers);
				$success=1;
				
			}
			else 
			  $success=2;
		}
	}
?>

<?php 
  include_once "header.php"; 
?>
<title>Forgot Password</title>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Book Management System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <?php echo menu("forgot"); ?>
    </div>
  </div>
</nav>
 
<div class="container content_area">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php if($errors): ?>
			<div class="alert alert-warning alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Warning!</strong> User Name <?php echo $errors['user_name']; ?>
			 </div>
			<?php endif; ?>
			
			<?php if($success == 1): ?>
			<div class="alert alert-info alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Password send on your mail!</strong>
			 </div>
			<?php elseif($success == 2): ?>
				<div class="alert alert-warning alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Warning!</strong> User Does't exits
				 </div>
			<?php endif; ?>
			<div class="panel panel-login">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12">
							<h4>Forgot Password</h4>
						</div>
						
					</div>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form id="login-form" action="" method="post" role="form" style="display: block;">
								<div class="form-group">
									<input type="text" name="user_name" id="user_name" tabindex="1" class="form-control" placeholder="Username" value=""  autofocus>
								</div>
								
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type=hidden name=caller value=self>
											<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Forgot Password">
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
