<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');

function nav_menu($dbc, $pageid) {
	
	$q = "SELECT * FROM pages";
	$r = mysqli_query($dbc, $q);
	
	while($nav = mysqli_fetch_assoc($r)) { ?>	

		<li<?php if($pageid == $nav['id']) { echo ' class="active"'; } ?>><a href="?page=<?php echo $nav['id']; ?>"><?php echo $nav['label']; ?></a></li>

	<?php }
	
}

?>