<?php
	// 黄LEDを消灯（非同期）
	exec("pigs m 16 w w 16 0 >/dev/null 2>&1 &");
?>
