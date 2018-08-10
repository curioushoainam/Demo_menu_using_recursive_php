<?php 
function plusOne($x){
	if($x < 10){
		echo ++$x .'<br>';
		plusOne($x);
	} else {
		echo 'finished';
	}
}
plusOne(5);

?>
