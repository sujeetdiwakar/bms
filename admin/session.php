<?php
	include_once "connect.php";
	session_start();
	$uid=$_REQUEST[uid];
	if(empty($uid)) $uid=$_SESSION[uid];
	$pwd=$_REQUEST[pwd];
	if(empty($pwd)) $pwd=$_SESSION[pwd];
	$q="select count(*) total from admin where admin_name='$uid' and admin_pass=PASSWORD('$pwd')";
	$qr=mysqli_query($conn, $q) or die($q);
	$r=mysqli_fetch_object($qr);
	$total=$r->total;
	if($total==1)
	{
		$_SESSION[uid]=$uid;
		$_SESSION[pwd]=$pwd;
		$logged_in=true;
	}
	else
	{
		session_destroy();
		$logged_in=false;
	}
?>
