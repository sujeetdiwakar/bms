<?php
	include_once "after_login_common.php";
	if(!($logged_in))
			echo "<script>window.open('index.php','_self')</script>";
	else
		$uid=$_SESSION['uid'];


	if ($caller=="self")
	{
			
			$errors=array();
			if(empty($crpass))
				$errors[crpass]= "Current Passowrd field is required";
			if(empty($newpass))
				$errors[newpass]= "New Passowrd field is required";
			if(empty($renewpass))
				$errors[renewpass]= "Confirm Passowrd field is required";
			if(empty($errors))
			{
				$q="select count(*) total from admin where admin_name='$uid' and admin_pass=PASSWORD('$crpass')";
				$qr=mysqli_query($conn, $q) or die($q);
				$r=mysqli_fetch_object($qr);
				$total=$r->total;
				if($total==1)
				{
					if ($newpass==$renewpass)
					{
						 
						$qc ="UPDATE admin SET admin_pass=PASSWORD('$newpass') WHERE admin_name='$uid'";
						mysqli_query($conn, $qc) or die($qc);
						$msg="Your password has been changed.";
						$_SESSION[pwd]=$newpass;
						
					}
					else
						$errors[renewpass]="New Password don't match";
				}
				else
					$errors[crpass]="Current Password doesn't match";
			}					
	}		
?>
<?php 
 include_once "header.php"; 
?>
<title>Change Password</title>
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
        <?php echo menu("chpass"); ?>
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
			
			<?php if($msg): ?>
			<div class="alert alert-info alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $msg; ?></strong>
			 </div>
			<?php endif; ?>
			<div class="panel panel-login">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12">
							<h4>Change Password</h4>
						</div>
						
					</div>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form id="login-form" action="" method="post" role="form" style="display: block;">
								<div class="form-group">
									<input type='password' name='crpass' tabindex="1" class="form-control" placeholder="Current Password" value=""  autofocus>
								</div>
								
								<div class="form-group">
									<input type='password' name='newpass' tabindex="1" class="form-control" placeholder="New Password" value="">
								</div>
								
								<div class="form-group">
									<input type='password' name='renewpass' tabindex="1" class="form-control" placeholder="Confirm Password" value="">
								</div>
								
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type=hidden name=caller value=self>
											<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Change Password">
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
