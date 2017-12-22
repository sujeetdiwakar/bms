<?php
	include_once "after_login_common.php";
	if(!($logged_in))
			echo "<script>window.open('index.php','_self')</script>";


	if($caller=='self')
	{
		if($conf=='yes')
		{
			$q="delete from user where id='$id'";
			if(mysqli_query($conn, $q))
			{
				//header("location:user_list.php");
				echo "<script>alert('User Deleted!')</script>";
				echo "<script>window.open('user_list.php','_self')</script>";
				
			}
		}
		else
			echo "<script>window.open('user_list.php','_self')</script>";
	}
?>
<?php 
 include_once "header.php"; 
 
?>
<title>Delete User</title>
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

			<form method=post>
			<table border='4' align='center' width=30%>
			<center><?php echo $success; ?></center>
			<tr>
				<th>
					Do you want to delete?
				</th>
			</tr>
			<tr>
				<td align='center'>
					<input type='radio' name='conf' value='yes'>yes
					<input type='radio' name='conf' value='no' checked>No
				</td>
			</tr>
			<tr>
				<td align='center'>
					<input type='hidden' name='caller' value='self'>
					<input type=hidden name=id value="<?php echo $id; ?>">
					<input class='btn btn-sm btn-danger' type='submit' value='Delete'>
				</td>
			</tr>
			</table>
			</form>
</div>
<?php include_once "footer.php"; ?>
