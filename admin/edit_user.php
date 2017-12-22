<?php
	include_once "after_login_common.php";
	if(!($logged_in))
			echo "<script>window.open('index.php','_self')</script>";
	if($caller=="self")
	{
		
		$errors=array();
		
		if(empty($name)) $errors[name]="Name field is required";
		else
			$q="select count(*) as total from user where id<>'$id' and name='$name'";
		
		if(empty($email)) $errors[email]="Email field is required";
		else
			$q="select count(*) as total from user where id<>'$id' and email='$email'";
		
		if(empty($user_name)) $errors[user_name]="Username field is required";
		else
			$q="select count(*) as total from user where id<>'$id' and user_name='$user_name'";
		if(empty($pass)) $errors[pass]="Password field is required";
		else
			$q="select count(*) as total from user where id<>'$id' and pass='$pass'";
	
		
		if(empty($errors))
		{
			//"UPDATE user SET pass=PASSWORD('$newpass') WHERE user_name='$uid'"
			$q="update user set name='$name',email='$email',user_name='$user_name',pass=PASSWORD('$pass') where id='$id'";
			mysqli_query($conn, $q) or die($q);
				$success="Updated Successfully";
		
		}
			
}	
	if($list=="edit")
	{
		$q="select *from user where id='$id'";
		$qr=mysqli_query($conn, $q);
		while($r = mysqli_fetch_object($qr))
		{
					$name=$r->name;
					$email=$r->email;
					$user_name=$r->user_name;
					//$pass=$r->pass;
		}

	}
?>
<?php 
 include_once "header.php";
?>
<title>Edit User Details</title>
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
        <?php echo menu(); ?>
    </div>
  </div>
</nav>
					
<div class="container content_area">		
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<?php if($errors): ?>
				<div class="alert alert-warning alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php foreach($errors as $error): ?>
					<strong>Warning!</strong> <?php echo $error; ?><br>
					<?php endforeach; ?>
				 </div>
				<?php endif; ?>
				
				<?php if($success): ?>
				<div class="alert alert-info alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><?= @$success; ?>!</strong>
				</div>
				<?php endif; ?>
				
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<h4>Edit User Details</h4>
							</div>
							
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" method="post" role="form">
									<div class="form-group">
										<input type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Name" value="<?php echo $name; ?>">
									</div>
									<div class="form-group">
										<input type="text" name="user_name" id="username" tabindex="2" class="form-control" placeholder="Username" value="<?= $user_name; ?>">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="Email Address" value="<?= $email; ?>">
									</div>
									<div class="form-group">
										<input type="password" name="pass" id="password" tabindex="4" class="form-control" placeholder="Password">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="6" class="form-control btn btn-register" value="Register Now">
												<input type=hidden name=caller value=self>
												<input type=hidden name=id value="<?php echo $id; ?>">
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
