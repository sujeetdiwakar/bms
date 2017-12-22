<?php 
 session_destroy();
 include_once "header.php"; 
 include_once "after_login_common.php";
?>
<title>Logout</title>
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
        <?php echo menu("logout"); ?>
    </div>
  </div>
</nav>
 
					
<div class="container content_area">
<?php
	echo "<script>window.open('login.php','_self')</script>";
?>
</div>
<?php include_once "footer.php"; ?>











