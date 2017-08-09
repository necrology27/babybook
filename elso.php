<?php
	$array = array('b', 'a', 'c', 'y', 'u');
	
	sort($array);
	
	for ($i = 0; $i < count($array); $i++) {
		echo $array[$i];
		echo "<br>";
	}
	
?>
