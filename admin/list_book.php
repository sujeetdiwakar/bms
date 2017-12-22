<?php
	include_once "after_login_common.php";
		if(!($logged_in))
			echo "<script>window.open('index.php','_self')</script>";
			
				if(empty($page_size)) $page_size=5;
				if(empty($current_page)) $current_page=1;
				$q = "select count(*) as total from books";
				$qr = mysqli_query($conn, $q) or die( $q);
				$r = mysqli_fetch_object($qr);
				$total_records = $r->total;
				$rem = $total_records % $page_size;
				if($rem == 0)
				 $total_pages = ($total_records / $page_size);
				else
					$total_pages = number_format($total_records/$page_size,0)+1;
					//echo $total_pages=ceiling(($total_records/$page_size)+1);
				$start=($current_page-1)*$page_size;
				if(empty($order)) $order="asc";
				else
				{
					if($order == "asc")
						$order = "desc";
					else 
						$order = "asc";
				}

?>
<?php 
 include_once "header.php"; 
?>
<title>List</title>
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
        <?php echo menu("list"); ?>
    </div>
  </div>
</nav>
 					
<div class="container content_area">
<div class="table-responsive">  			
<table class="table">
<tr>
<th>S No.</th>
<th><a href=list_book.php?page_size=<?php echo $page_size;?>&current_page=<?php echo $current_page;?>&column=title&order=<?php echo
$order?>>Title<a></th>
<th><a href=list_book.php?page_size=<?php echo $page_size;?>&current_page=<?php echo $current_page;?>&column=author&order=<?php echo
$order?>>Author</a></th> 
<th><a href=list_book.php?page_size=<?php echo $page_size;?>&current_page=<?php echo $current_page;?>&column=isbm&order=<?php echo
$order?>>ISBM</a></th>
<th><a href=list_book.php?page_size=<?php echo $page_size;?>&current_page=<?php echo $current_page;?>&column=page&order=<?php echo
$order?>>Page</a></th>
<th><a href=list_book.php?page_size=<?php echo $page_size;?>&current_page=<?php echo $current_page;?>&column=tchap&order=<?php echo
$order?>>Total Chapter</a></th>
<th><a href=list_book.php?page_size=<?php echo $page_size;?>&current_page=<?php echo $current_page;?>&column=edition&order=<?php echo
$order?>>Edtion</a></th>
<th><a href=list_book.php?page_size=<?php echo $page_size;?>&current_page=<?php echo $current_page;?>&column=pub&order=<?php echo
$order?>>Publication</a></th>

<th><a href=list_book.php?page_size=<?php echo $page_size;?>&current_page=<?php echo $current_page;?>&column=price&order=<?php echo
$order?>>Price</a></th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
	if(empty($column)) { $lq = "truncate books1"; mysqli_query($conn, $lq)or die($lq);} 
	
	if(empty($column)) $lq = "select *from books limit $start, $page_size";
	else $lq = "select *from books1 order by $column $order";
	$row = mysqli_query($conn, $lq);
	$sno = 1;
	while($r = mysqli_fetch_object($row))
	{
		$id=$r->id;
		$title=$r->title;
		$author=$r->author;
		$isbm=$r->isbm;
		$page=$r->page;
		$tchap=$r->tchap;
		$edition=$r->edition;
		$pub=$r->pub;
		$price=$r->price;
		echo"<tr>";
		echo"<td>$sno</td>";
		echo"<td>$title</td>";
		echo"<td>$author</td>";
		echo"<td>$isbm</td>";
		echo"<td>$page</td>";
		echo"<td>$tchap</td>";
		echo"<td>$edition</td>";
		echo"<td>$pub</td>";
		echo"<td>$price</td>";
		echo"<td><a class='btn btn-success' href='edit_book.php?id=$id&list=edit'><i class='fa fa-pencil-square-o fa-lg'></i> Edit</a></td>";
		echo"<td><a class='btn btn-danger' href='delete_book.php?id=$id'><i class='fa fa-trash-o fa-lg'></i> Delete</a></td>";
		echo"</tr>";
		$sno++;
		if(empty($column)) 
		{
			//insert into book1();
			$q="INSERT INTO books1(title,author,isbm,page,tchap,edition,pub,price) values('".$title."', '".$author."', '".$isbm."', '".$page."', '".$tchap."', '".$edition."', '".$pub."', '".$price."')";
			mysqli_query($conn, $q) or die($q);
		}

	}

	$page_size_options="<form><select class='form-control' name=page_size onchange=this.form.submit();>";
	for($i=5; $i<=20; $i+=5)
	{
		if($i==$page_size)
			$page_size_options.="<option value=$i selected>$i</option>";
		else
			$page_size_options.="<option value=$i>$i</option>";
	}
	$page_size_options.="</select></form>";
	

	$current_page_options="<form><select class='form-control' name=current_page onchange=this.form.submit();>";
	for($i=1; $i<=$total_pages; $i++)
	{
		if($i==$current_page)
			$current_page_options.="<option value=$i selected>$i</option>";
		else
			$current_page_options.="<option value=$i>$i</option>";
	}
	$current_page_options.="</select><input type=hidden name=page_size value=$page_size></form>";
	
?>
<tr>
	<td>Page size</td>
	<td>
		<?php echo $page_size_options;?>
	</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td>Current page </td>
	<td>
		<?php echo $current_page_options;?>
	</td>
</tr>
<tr>
	<td colspan=11></td>
</tr>
</table>
</div>		
</div>
<?php include_once "footer.php"; ?>
