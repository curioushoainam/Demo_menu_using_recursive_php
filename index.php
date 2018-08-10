<?php 
// build a very basic menu

$menu = array(
	'about' => array(
		'display'=>'About Us'
	),
	'blog' => array(
		'display'=>'Read Our Blog'
	),
	'links' => array(
		'display'=>'Recommed Links'
	),
	'contact' => array(
		'display'=>'Contact Us'
	)
);

function buildMenu($menu_array){
	$menu = '<ul>';
	foreach($menu_array as $id => $properties) {
		$display = $properties['display'];
		$menu .=  '<li>'.$display.'</li>';
	}	
	return $menu . "</ul>";
}

?>

<html>
	<head></head>
	<body>
		<!-- <ul>
			<li>About Us</li>
			<li>Read Our Blog</li>
			<li>Recommed Links</li>
			<li>Contact Us</li>
		</ul> -->
		<?php 
			echo buildMenu($menu);
		 ?>
	</body>

</html>
