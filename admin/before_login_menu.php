<?php

function menu($page=null)
{
	$menu="<ul class='nav navbar-nav navbar-right'>";


	if($page=="signin")
		$menu.="<li class='nav-item active'>
				<a class='nav-link' href='index.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>
			  </li>";
		
	else
		$menu.="<li class='nav-item'>
				<a class='nav-link' href='index.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>
			  </li>";
			  
	$menu.="</ul>";
	return($menu);
}	
	
?>

