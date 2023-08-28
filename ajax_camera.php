<?php
	// カメラ撮影
	$img_file = "../img/download.jpg";
	exec(sprintf("sudo wget -O %s http://localhost:51015/?action=snapshot", $img_file));
?>
