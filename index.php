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
		'display'=>'Recommed Links',
		// level 1 has 2 submenus that are products and services
		'sub' => array(
			'products'=>array(
				'display'=>'High-Quality Products',
				'url' => 'links/#products'
			),
			'services'=>array(
				'display'=>'Helpful Services',
				'url' => 'links/#services',
				// level 2 has 2 submenus that are local and online
				'sub'=> array(
					'local'=>array(
						'display'=>'Local Services',
						'url' => 'links/#services_local'
					),
					'online'=>array(
						'display'=>'Online Services',
						'url' => 'links/#services_online'
					)
				)
			)
		)
	),
	'contact' => array(
		'display'=>'Contact Us'
	)
);

function buildMenu($menu_array, $is_sub=FALSE){
	// use variable is_sub to define menu ID for CSS styling
	// if submenu is not available then id="menu"; otherwise, class="submenu"
	$attr = (!$is_sub) ? ' id="menu" ' : ' class="submenu" ';

	$menu = '<ul'. $attr .'>'; // open menu container

	// create menu HTML here ...
	// for the highest menu, $id is 'about' or 'blog' or ... and $properties is array(...)
	foreach($menu_array as $id => $properties) {
		foreach ($properties as $key => $val){

			// if $val is an array, means that there are submenu.
			// Then we will recall the buildMenu function recursion. .
			if(is_array($val)){
				$sub = buildMenu($val, TRUE);
			}
			// Otherwise, set $sub = NULL and store the element's value in a variable
			else {
				$sub = NULL;
				$$key = $val;	// the key contains 2 variable $url and $display				
			}
		}

		// If no array element has the key 'url', set $url variable equal to the containing element's 
		if(!isset($url)){
			$url = $id;
		}

		// output HTML
		$menu .= '<li><a href="'.$url.'" >'.$display.'</a>'.$sub.'</li>';

		// destroy the variables to ensure they're reset on each iteration
		unset ($url, $display, $sub);

	}	
	return $menu . '</ul>';		// close menu container
}

?>

<html>
	<head></head>
	<body>
		<?php 
			echo buildMenu($menu);
		 ?>
		<!-- <ul>
			<li>About Us</li>
			<li>Read Our Blog</li>
			<li>Recommed Links
				<ul>
					<li>High-Quality Products</li>
					<li>Helpful Services
						<ul>
							<li>Local Services</li>
							<li>Online Services</li>
						</ul>
					</li>
				</ul>
			</li>
			<li>Contact Us</li>
		</ul> -->	
<?php 
	// $Bar = "a";
	// $Foo = "Bar";
	// $World = "Foo";
	// $Hello = "World";
	// $a = "Hello";

	// echo $a; //Returns Hello
	// echo $$a; //Returns World
	// echo $$$a; //Returns Foo
	// echo $$$$a; //Returns Bar
	// echo $$$$$a; //Returns a

?>


	</body>

</html>
