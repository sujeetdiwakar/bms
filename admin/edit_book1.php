<?php
	include_once "after_login_common.php";
	if(!($logged_in))
			echo "<script>window.open('index.php','_self')</script>";
	if($caller=="self")
	{
		
		$errors=array();
		
		if(empty($title)) $errors[title]="empty";
		else
			$q="select count(*) as total from books whre id<>'$id' and title='$title'";
		
		if(empty($author)) $errors[author]="empty";
		else
			$q="select count(*) as total from books whre id<>'$id' and title='$author'";
		
		if(empty($isbm)) $errors[isbm]="empty";
		else
			$q="select count(*) as total from books whre id<>'$id' and title='$isbm'";

		if(empty($page)) $errors[page]="empty";
		else
			$q="select count(*) as total from books whre id<>'$id' and title='$page'";
	
		if(empty($tchap)) $errors[tchap]="empty";
		else
			$q="select count(*) as total from books whre id<>'$id' and title='$tchap'";

		if(empty($edition)) $errors[edition]="empty";
		else
			$q="select count(*) as total from books whre id<>'$id' and title='$edition'";
		
		if(empty($pub)) $errors[pub]="empty";
		else
			$q="select count(*) as total from books whre id<>'$id' and title='$pub'";
	
		if(empty($price)) $errors[price]="empty";
		else
			$q="select count(*) as total from books whre id<>'$id' and title='$price'";
		
		if(empty($errors))
		{
			$q="update books set title='$title',author='$author',isbm='$isbm',tchap='$tchap',edition='$edition',pub='$pub',price='$price' where id='$id'";
			if(mysqli_query($conn, $q))
			{
				$success="Upaded";
				//foreach ($_REQUEST as $var=>$val)
				 //$$var="";
			}		
		}
			
}	
	if($list=="edit")
	{
		$q="select *from books where id='$id'";
		$qr=mysqli_query($conn, $q);
		while($r=mysqli_fetch_object($qr))
		{
					$title=$r->title;
					$author=$r->author;
					$isbm=$r->isbm;
					$page=$r->page;
					$tchap=$r->tchap;
					$edition=$r->edition;
					$pub=$r->pub;
					$price=$r->price;
		}

	}
?>
<?php 
 include_once "header.php"; 
?>
<title>Edit Book Details</title>
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
	 
		<form method=get>
		<table align=center border=10 width=60%>
		<tr>
		<center><?php echo $success; ?></center><br>
		<th width=50% align='right'>Title:</th><td><input name=title value="<?php echo $title; ?>"><font color=red> <?php echo $errors[title]; ?>
	</font></td>
		</tr>
		<tr>
		<th align='right'>Author:</th><td><input name=author value="<?php echo $author; ?>"><font color=red> <?php echo $errors[author]; ?>
	</font></td>
		</tr>
		<tr>
		<th align='right'>ISBM:</th><td><input name=isbm value="<?php echo $isbm; ?>"><font color=red> <?php echo $errors[isbm]; ?>
	</font></td>
		</tr>
		<tr>
		<th align='right'>Publication:</th><td><input name=pub value="<?php echo $pub; ?>"><font color=red> <?php echo $errors[pub]; ?>
	</font></td>
		</tr>
		<tr>
		<th align='right'>Page:</th><td><input name=page value="<?php echo $page; ?>"><font color=red> <?php echo $errors[page]; ?>
	</font></td>
		</tr>
		<tr>
		<th align='right'>Total Chapter:</th><td><input name=tchap value="<?php echo $tchap; ?>"><font color=red> <?php echo $errors[tchap]; ?>
	</font></td>
		</tr>
		<tr>
		<th align='right'>Edition:</th><td><input name=edition value="<?php echo $edition; ?>"><font color=red> <?php echo $errors[edition]; ?>
	</font></td>
		</tr>
		<tr>
		<th align='right'>Price:</th><td><input name=price value="<?php echo $price; ?>"><font color=red> <?php echo $errors[price]; ?>
	</font></td>
		</tr>
		<tr>
		<td colspan=2 align=center>
			<input type=hidden name=caller value=self>
			<input type=hidden name=id value="<?php echo $id; ?>">
			<input type=submit value="Update">
		</td>
		</tr>
		</table>

</div>
<?php include_once "footer.php"; ?>
