<?php

	function menu($page=null)
	{
		
		
		$menu="<ul class='nav navbar-nav navbar-right'>";


		if($page=="home")
			$menu.="<li class='nav-item active'>
					<a class='nav-link' href='home.php'>Home</a>
				  </li>";
			
		else
			$menu.="<li class='nav-item'>
					<a class='nav-link' href='home.php'>Home</a>
				  </li>";
				  
		if($page=="user")
			$menu.="<li class='nav-item active'>
					<a class='nav-link' href='user_list.php'>User List</a>
				  </li>";
			
		else
			$menu.="<li class='nav-item'>
					<a class='nav-link' href='user_list.php'>User List</a>
				  </li>";
				  
		if($page=="list")
			$menu.="<li class='nav-item active'>
					<a class='nav-link' href='list_book.php'>Book List</a>
				  </li>";
			
		else
			$menu.="<li class='nav-item'>
					<a class='nav-link' href='list_book.php'>Book List</a>
				  </li>";
				  
		if($page=="chpass")
			$menu.="<li class='nav-item active'>
					<a class='nav-link' href='change_password.php'>Change Password</a>
				  </li>";
			
		else
			$menu.="<li class='nav-item'>
					<a class='nav-link' href='change_password.php'>Change Password</a>
				  </li>";
				  
		if($page=="logout")
			$menu.="<li class='nav-item active'>
					<a class='nav-link' href='logout.php'>Logout</a>
				  </li>";
			
		else
			$menu.="<li class='nav-item'>
					<a class='nav-link' href='logout.php'>Logout</a>
				  </li>";
				  
		
		
		$menu.="</ul>";
		return($menu);
		
	
	}
?>

