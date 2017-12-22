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
      <a class="navbar-brand" href="#">Book Management System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <?php echo menu("home"); ?>
    </div>
  </div>
</nav>
					
<div class="container content_area">

<?php
	if($logged_in)
		echo "<center>Welcome To Admin Panel</center>";
	else
	{	
		if(empty($_REQUEST['uid'])||empty($_REQUEST['pwd']))
			echo "<center>Username or Password is blank<br><a href=index.php>Login</a></center>";
		else
			echo "<center>Invalid User or Password<br><a href=index.php>Login</a></center>";
		
	}
?>
</div>
<?php include_once "footer.php"; ?>				
