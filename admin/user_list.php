<?php
	include_once "after_login_common.php";
	if(!($logged_in))
			echo "<script>window.open('index.php','_self')</script>";
?>
			
<?php 
 include_once "header.php"; 
?>
<title>User List</title>
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
        <?php echo menu("user"); ?>
    </div>
  </div>
</nav>
					
<div class="container content_area">
					
<div class="table-responsive">  			
<table class="table" id="users">
	<tr>
		<th>Username</th>
		<th>Email</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
		$q="select *from user";
		$qr=mysqli_query($conn, $q) or die($q);
		while($r=mysqli_fetch_object($qr))
		{
			$id=$r->id;
			echo "<tr>";
			echo "<td><a href='user_details.php?id=$id'>$r->user_name</a></td>";
			echo "<td>$r->email</td>";
			echo "<td><a title='Edit' class='text-success' href='edit_user.php?id=$id&list=edit'><i class='fa fa-pencil-square-o fa-lg'></i></a></td>";
			echo "<td><a title='Delete' class='text-danger' href='delete_user.php?id=$id'><i class='fa fa-trash-o fa-lg'></i></a></td>";
			echo "</tr>";
		}
	?>
	<tr>
		<td colspan=4></td>
	</tr>
</table>
</div>
<br>			
	<center><a class="btn btn-sm btn-info" href='registration.php'>Add New user</a></center>
				
</div>
<?php include_once "footer.php"; ?>
