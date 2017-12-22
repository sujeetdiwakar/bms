<?php
	include_once "after_login_common.php";
	if(!($logged_in))
			echo "<script>window.open('login.php','_self')</script>";
	if($caller=="self")
	{
		
		$errors=array();
		
		if(empty($title)) $errors[title]="Title field is required";
		else if(!(preg_match("/[a-z]/i",$title))) $errors[title]="Invalid Title";

		if(empty($author)) $errors[author]="Author field is required";
		else if(!(preg_match("/[a-z]/i",$author))) $errors[author]="Invalid Author Name";

		if(empty($isbm)) $errors[isbm]="ISBN field is required";
		else if(preg_match("/\D/i",$isbm)) $errors[isbm]="Invalid ISBN";

		if(empty($page)) $errors[page]="Page No. field is required";
		else if(preg_match("/\D/i",$page)) $errors[page]="Invalid Page No";

		if(empty($tchap)) $errors[tchap]="Total Chapter field is required";
		else if(preg_match("/\D/i",$tchap)) $errors[tchap]="Invalid Chapter";

		if(empty($edition)) $errors[edition]="Edition field is required";
		
		if(empty($pub)) $errors[pub]="Publication field is required";
		else if(!(preg_match("/[a-z]/i",$pub))) $errors[pub]="Invalid Publication Name";

		if(empty($price)) $errors[price]="Price field is required";
		else if(preg_match("/\D/i",$price)) $errors[price]="Invalid Price";
		
		if(empty($errors))
		{
			$q="update books set title='$title',author='$author',isbm='$isbm',tchap='$tchap',edition='$edition',pub='$pub',price='$price' where id='$id'";
			if(mysqli_query($conn, $q))
			{
				$success="Updated Successfully";
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
								<h4>Edit Book Record</h4>
							</div>
							
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" method="get" role="form">
									<div class="form-group">
										<input type="text" name="title" value="<?php echo $title; ?>" tabindex="1" class="form-control" placeholder="Title">
									</div>
									<div class="form-group">
										<input type="text" name="author" value="<?php echo $author; ?>" tabindex="2" class="form-control" placeholder="Author">
									</div>
									<div class="form-group">
										<input type="text" name="isbm" value="<?php echo $isbm; ?>" tabindex="3" class="form-control" placeholder="ISBN">
									</div>
									<div class="form-group">
										<input type="text" name="pub" value="<?php echo $pub; ?>" tabindex="4" class="form-control" placeholder="Publication">
									</div>
									<div class="form-group">
										<input type="text" name="page" value="<?php echo $page; ?>" tabindex="5" class="form-control" placeholder="Page No.">
									</div>
									<div class="form-group">
										<input type="text" name="tchap" value="<?php echo $tchap; ?>" tabindex="5" class="form-control" placeholder="Total Chapter">
									</div>
									<div class="form-group">
										<input type="text" name="edition" value="<?php echo $edition; ?>" tabindex="5" class="form-control" placeholder="Edition">
									</div>
									<div class="form-group">
										<input type="text" name="price" value="<?php echo $price; ?>" tabindex="5" class="form-control" placeholder="Price">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="6" class="form-control btn btn-register" value="Update">
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
