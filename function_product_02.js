// 赤LED点灯
function RedLedOnAjax(){
    $.ajax({
		url: './_php/ajax_led_red_on.php'
    })
    // 成功時
    .done(function(data) {
		// 何もしない
    })
    // 失敗時
    .fail(function() {
		// 何もしない
    });
}
// 赤LED点灯
function RedLedOffAjax(){
    $.ajax({
		url: './_php/ajax_led_red_off.php'
    })
    // 成功時
    .done(function(data) {
		// 何もしない
    })
    // 失敗時
    .fail(function() {
		// 何もしない
    });
}

// 黄LED点灯
function YellowLedOnAjax(){
    $.ajax({
		url: './_php/ajax_led_yellow_on.php'
    })
    // 成功時
    .done(function(data) {
		// 何もしない
    })
    // 失敗時
    .fail(function() {
		// 何もしない
    });
}
// 黄LED点灯
function YellowLedOffAjax(){
    $.ajax({
		url: './_php/ajax_led_yellow_off.php'
    })
    // 成功時
    .done(function(data) {
		// 何もしない
    })
    // 失敗時
    .fail(function() {
		// 何もしない
    });
}

// エアコン温度に合わせてブザー鳴らし
function AirTempAjax(){
    let temp = $('#tempVal')[0].value;
    $.ajax({
	url: './_php/ajax_air_temp.php?temp=' + temp
    })
    // 成功時
    .done(function(data) {
		// 何もしない
    })
    // 失敗時
    .fail(function() {
		// 何もしない
    });
}

// 定期実行（3秒おきに温度・湿度・気圧を更新）
$(function(){
	setInterval(function(){
		ChangeDisplay()		
	},3000);
});

// 読み込み時に表示更新
$(document).ready( function(){
	ChangeDisplay();
});

// 画面表示の更新
// BME280の値を取得して気温・湿度・気圧を更新
// 距離センサーを使用して人がいるかを更新
function ChangeDisplay(){
    $.ajax({
		url: './_php/ajax_dsp_change.php',
        type: 'get',
        dataType: 'json'
      }
    )
    // 成功時
    .done(function(json) {
      	$('#TempVal')[0].innerText = '：' + json.temp + ' ℃';
		$('#HumiVal')[0].innerText = '：' + json.humi + ' ％';
		$('#PressVal')[0].innerText = '：' + json.press + ' hPa';
		if(json.temp > 29){
			$('#MsgText').removeClass("MsgTextGreen");
			$('#MsgText').removeClass("MsgTextRed");
			$('#MsgText').addClass("MsgTextRed");
			$('#MsgText')[0].innerText = '暑すぎます';
		}else{
			$('#MsgText').removeClass("MsgTextGreen");
			$('#MsgText').removeClass("MsgTextRed");
			$('#MsgText').addClass("MsgTextGreen");
			$('#MsgText')[0].innerText = '正常です';
		}
    })
    // 失敗時
    .fail(function() {
		alert('ajax error!!!');
    });
}

// カメラ表示切り替え
function CameraEnabled(flg){
	if(flg){
		$('#liveImage').attr('src', 'http://10.10.140.216:51015/?action=stream');
		$('#OffBtn').removeClass("redText");
		$('#OnBtn').addClass("redText");
	}else{
		$('#liveImage').attr('src', './img/noimage.png');
		$('#OnBtn').removeClass("redText");
		$('#OffBtn').addClass("redText");
	}
}

// snapshotダウンロード
function SnapShotDownload(){
	if($('#liveImage').attr('src') == './img/noimage.png'){
		alert('camera disabled!!');
		return;
	}
    $.ajax({
		url: './_php/ajax_camera.php',
        async : false
      }
    )
    // 成功時
    .done(function(data) {
		downloadImage('./img/download.jpg');
    })
    // 失敗時
    .fail(function() {
		alert('camera error !!!');
    });
}

// ファイルダウンロード
function downloadImage(url){
  const matches = url.match(/[A-Za-z0-9\-_]+\.\w+$/);
 
  fetch(url, {
    method: 'GET',
    headers: {},
  })
    .then((response) => {
      response.arrayBuffer().then((buffer) => {
        const url = window.URL.createObjectURL(new Blob([buffer]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', matches[0]);
        document.body.appendChild(link);
        link.click();
      });
    })
    .catch((err) => {
      console.log(err);
    });
}
