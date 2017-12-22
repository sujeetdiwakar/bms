<?php 
 include_once "header.php"; 
 include_once "after_login_common.php";
?>
<title>Home</title>
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
		<?php 
		if($logged_in)
          echo menu("home");
        ?>
    </div>
  </div>
</nav>
 
<div class="container content_area">
					
<?php
	if($logged_in)
		echo "<div class='welcome'><center><h1>Welcome To BMS</h1></center></div>";
	else
	{	
		if(empty($_REQUEST['uid'])||empty($_REQUEST['pwd']))
			echo "<div class='alert alert-warning text-center'>
			   
				<strong>Warning!</strong> Username or Password is blank<br> <a href='login.php' class='alert-link'>Login</a>.
			 </div>";
		else
			echo "<div class='alert alert-warning text-center'>
			   
				<strong>Warning!</strong> Invalid User or Password<br> <a href='login.php' class='alert-link'>Login</a>.
			 </div>";	
	}
?>
</div>
<?php include_once "footer.php"; ?>
