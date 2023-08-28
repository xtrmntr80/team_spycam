<?php
	// 赤LEDを消灯（非同期）
	exec("pigs m 5 w w 5 0 >/dev/null 2>&1 &");
?>
