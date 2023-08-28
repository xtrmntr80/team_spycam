<?php	
	// 光センサ値
	$brightness = 0;
	//------------------------------------------------
	// 光センサの値取得
	//------------------------------------------------
	function GetBrightness(){
		global $brightness;
		$brightness = exec("sudo python3 ./_python/adc_once.py 0");
	}
	
	// 距離センサ（電圧値）
	$dist_volt = 0;
	// 距離センサ（値）
	$dist_val = 0;
	// 距離センサ（表示値）
	$dist_dsp = "- cm";
	//------------------------------------------------
	// 距離センサの値取得
	//------------------------------------------------
	function GetDistance(){
		global $dist_volt, $dist_val, $dist_dsp;
		$value = exec("sudo python3 ./_python/adc_once.py 2");
		$dist_volt = $value / 1000;
		$dist_val = (470.0 - $dist_volt * 200.0) / 7.0;
		$dist_dsp = number_format($dist_val, 1) . " cm";
		return $dist_dsp;
	}
	
	// 気温（値）
	$temp_val = 0;
	// 気温（表示）
	$temp_dsp = "- ℃";
	// 湿度（値）
	$humi_val = 0;
	// 湿度（表示）
	$humi_dsp = "- ％";
	// 気温（値）
	$press_val = 0;
	// 気温（表示）
	$press_dsp = "- hPa";
	//------------------------------------------------
	// BME280の値取得
	//------------------------------------------------
	function GetBme280(){
		global $temp_val, $temp_dsp, $humi_val, $humi_dsp, $press_val, $press_dsp;
		// BME280値取得
		$values = exec("sudo python3 ./_python/bme280_once.py");
		// CSVを分割
		$array = explode(",", $values);
		// 値を代入
		$temp_val = $array[0];
		$temp_dsp = sprintf("%.1f ℃", $temp_val);
		$humi_val = $array[2];
		$humi_dsp = sprintf("%.1f ％", $humi_val);
		$press_val = $array[1];
		$press_dsp = sprintf("%d hPa", $press_val);
	}
?>
