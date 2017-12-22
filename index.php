<?php 
  include_once "header.php";
  include_once "before_login_common.php";
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
        <?php echo menu(); ?>
    </div>
  </div>
</nav> 
<div class="container content_area">
  <div class="welcome">
		<center><h1>Wecome To Book Management System</h1>
  </div>	
</div>		
<?php include_once "footer.php"; ?>
