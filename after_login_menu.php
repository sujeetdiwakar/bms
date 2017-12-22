
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
		if($page=="addbook")
		    $menu.="<li class='nav-item active'>
					<a class='nav-link' href='add_book.php'>Add Book</a>
				  </li>";
		else
			$menu.="<li class='nav-item'>
					<a class='nav-link' href='add_book.php'>Add Book</a>
				  </li>";

		if($page=="addchap")
		    $menu.="<li class='nav-item active'>
					<a class='nav-link' href='add_chapters.php'>Add Chapter</a>
				  </li>";
		else
			$menu.="<li class='nav-item'>
					<a class='nav-link' href='add_chapters.php'>Add Chapter</a>
				  </li>";

		if($page=="list")
		    $menu.="<li class='nav-item active'>
					<a class='nav-link' href='list_book.php'>List Books</a>
				  </li>";
		else
			$menu.="<li class='nav-item'>
					<a class='nav-link' href='list_book.php'>List Books</a>
				  </li>";
			
		if($page=="chpass")
		    $menu.="<li class='nav-item active'>
					<a class='nav-link' href='change_password.php'>Change password</a>
				  </li>";
		else
			$menu.="<li class='nav-item'>
					<a class='nav-link' href='change_password.php'>Change password</a>
				  </li>";
		
		if($page=="logout")
		    $menu.="<li class='nav-item active'>
					<a class='nav-link' href='logout.php'>Log out</a>
				  </li>";
			
		else
			$menu.="<li class='nav-item'>
					<a class='nav-link' href='logout.php'>Log out</a>
				  </li>";
				  
		$menu.="</ul>";
		
		return($menu);
	}
?>
