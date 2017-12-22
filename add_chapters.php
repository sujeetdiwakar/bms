<?php
	include_once "after_login_common.php";
		if(!($logged_in))
			echo "<script>window.open('login.php','_self')</script>";
	if(empty($book_id) and empty($ch_no))
	{
		$book_option="<select class='form-control' name=book_id>";
		$book_option.="<option value=''>Select</option>";
		$q="select *from books";
		$qr=mysqli_query($conn, $q);
		while($r=mysqli_fetch_object($qr))
		{
			$bid=$r->id;
			$btitle=$r->title;
			$book_option.="<option value='$bid'>$btitle</option>";
		}
		$book_option.="</select>";	
	}
	if(!empty($book_id))
	{
		$book_option="<select class='form-control' name=book_id disabled=true>";
		$book_option.="<option value=''>Select</option>";
		$q="select *from books";
		$qr=mysqli_query($conn, $q);
		while($r=mysqli_fetch_object($qr))
		{
			$bid=$r->id;
			$btitle=$r->title;
			if($bid==$book_id)
						$book_option.="<option value=$bid selected>$btitle</option>";
					else
						$book_option.="<option value=$bid>$btitle</option>";
		}
		$book_option.="</select><input type=hidden name=book_id value=$book_id>";	
	}
	if(empty($ch_no))
	{
		$ch_option="<select class='form-control' name=ch_no>";
		$ch_option.="<option value=''>Select</option>";
		$q="select *from books where id='$book_id'";
		$qr=mysqli_query($conn, $q);
		$r=mysqli_fetch_object($qr);
		$total_chap=$r->tchap;
		for($i=1; $i<=$total_chap; $i++)
			$ch_option.="<option value=$i>$i</option>";
		$ch_option.="</select>";	
	}
	else
	{
		$ch_option="<select class='form-control' name=ch_no  disabled=true>";
		$ch_option.="<option value=''>Select</option>";
		$q="select *from books where id='$book_id'";
		$qr=mysqli_query($conn, $q);
		$r=mysqli_fetch_object($qr);
		$total_chap=$r->tchap;
		for($i=1; $i<=$total_chap; $i++)
		{
			if($i==$ch_no)
				$ch_option.="<option value=$i selected>$i</option>";
			else
				$ch_option.="<option value=$i>$i</option>";
		}
		$ch_option.="</select><input type=hidden name=ch_no value=$ch_no>";	
	}
	if(!empty($content))
	{
		$q="select count(*) as total from chapter where book_id='$book_id' and chap_no='$ch_no'";
		$qr=mysqli_query($conn, $q);
		$r=mysqli_fetch_object($qr);
		$total=$r->total;
		if($total==0)
		{		
			$q="insert into chapter values (null,$book_id,'$content',$ch_no)";
			mysqli_query($conn, $q) or die($q);
			$success="saved";			
			foreach($_REQUEST as $var=>$val) $$var="";
		}
		else
		{
			$q="update chapter set content='$content' where book_id='$book_id' and chap_no='$ch_no'";
			mysqli_query($conn, $q) or die($q);
			$success="Updated";
			foreach($_REQUEST as $var=>$val) $$var="";
		}
	}
?>	
<?php 
 include_once "header.php"; 

?>
<title>Add Chapter</title>
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
        <?php echo menu("addchap"); ?>
    </div>
  </div>
</nav>
					
<div class="container content_area">
<form action='add_chapters.php'>
<table align="center" width=40% class='table table-striped bootstrap-datatable datatable'>
	<?php if($success): ?>
	<div class="alert alert-info alert-dismissable fade in text-center">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong><?= @$success; ?>!</strong>
	</div>
	<?php endif; ?>
	
	<tr>
		<td class='col-md-12 text-center' colspan=4>
		<h3>
		  Add Chapter
		</h3>
		</td>
	</tr>
	<tr>
		<td class='col-md-4'></td>
		<td class='col-md-1'>Book</td>
		<td class='col-md-3'><?php echo $book_option; ?></td>
		<td class='col-md-4'></td>
	</tr>
	<tr>
		<td class='col-md-4'></td>
		<td class='col-md-1'>Chapter</td>
		<td class='col-md-3'><?php echo $ch_option; ?></td>
		<td class='col-md-4'></td>
	<tr>
		<?php
		if(!empty($ch_no))
		{
		?>
			<?php
				$q="select *from chapter where book_id='$book_id' and chap_no='$ch_no'";
				$qr=mysqli_query($conn, $q);
				$r=mysqli_fetch_object($qr);
				$content=$r->content;
			?>
			<tr>
				<td class='col-md-4'></td>
				<td class='col-md-1'>Content</td>
				<td class='col-md-3'>
					<textarea class='form-control' rows='5' name='content'><?php echo $content; ?></textarea>
				</td>
				<td class='col-md-4'></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td class='col-md-3'></td>
			<td class='col-md-4' colspan=2><input class="form-control btn btn-register" type=submit value="OK"></td>
			<td class='col-md-4'></td>
		</tr>
</table>
</form>
</div>
<?php include_once "footer.php"; ?>
