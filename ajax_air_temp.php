<?php
	$id = $_GET['temp'];	
	$temp = $id * 100;
	// ブザーを鳴らす（非同期）
	exec("pigs w 12 1 mils " . $temp . " w 12 0 >/dev/null 2>&1 &");
?>
