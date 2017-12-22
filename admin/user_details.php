<?php
	include_once "after_login_common.php";
	if(!($logged_in))
			echo "<script>window.open('index.php','_self')</script>";
?>
<?php 
 include_once "header.php"; 
?>
<title>User Details</title>
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
					<div class="table-responsive">  			
					<table class="table">
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Username</th>
						</tr>
						<?php
							$q="select *from user where id='$id'";
							$qr=mysqli_query($conn, $q) or die($q);
							while($r=mysqli_fetch_object($qr))
							{
								$id=$r->id;
								echo "<tr>";
								echo "<td>$r->name</td>";
								echo "<td>$r->email</td>";
								echo "<td>$r->user_name</td>";
								echo "</tr>";
							}
						?>
						<tr>
							<td colspan=3></td>
						</tr>
					</table>
					</div>
					<br>		
						
						<center><a class="btn btn-sm btn-success" href='user_list.php'>Back</a></center>
</div>
<?php include_once "footer.php"; ?>
