<?php
	$pageTitle = "監視カメラ";
?>
<html>
	<head>
		<!--レスポンシブデザイン用のビューポート指定 -->	
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title><?php echo $pageTitle; ?></title>
		<link rel="stylesheet" type="text/css" href="./scamera_6_1.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="./_js/function_product.js"></script>
	</head>
	<body>
		<!-- ヘッダー -->
		<?php include_once("./_php/header.php"); ?>
		
		<!--メインコンテンツ -->	
		<article>
			
			<!-- ライブ映像枠 -->	
			<section id="liveImageBox">
				<img id="liveImage" src="./img/noimage.png" /><br />
			</section>
			
			<!-- 区切り線 -->	
			<hr />
			
			<!-- 気温枠の変更 -->	
            <section id="TempBox">
                <div id="TempVal" class="valueBox"></div>
            </section>

            <!-- 湿度枠の変更 -->	
            <section id="HumiBox">
                <div id="HumiVal" class="valueBox"></div>
            </section>
			
			<!-- メッセージ枠 -->	
			<section id="MsgBox">
				<div id="MsgText" class="MsgTextGreen">正常です</div>
			</section>

			<!-- カメラON/OFF枠 -->	
			<section id="SwitchBox">
				<button id="OnBtn" class="Btn" onclick="CameraEnabled(true)">Camera ON</button>
				<button id="OffBtn" class="Btn redText" onclick="CameraEnabled(false)">Camera OFF</button>
			</section>
			
			<!-- エアコンスイッチ枠 -->
			<section id="AirBtnBox">
				<button class="Btn" onclick="RedLedOnAjax()">エアコンON</button>
				<button class="Btn" onclick="RedLedOffAjax()">エアコンOFF</button>				
			</section>

			<!-- エアコン温度調整枠 -->
			<section id="AirTmpBox">
				<label>設定温度:<input id="tempVal" type="number" name="example" min="16" max="30" value="27"></label>
				<button id="AirBtn" onclick="AirTempAjax()">送信</button>
			</section>

			<!---照明スイッチ枠 -->
			<section id="LightBtnBox">
				<button class="Btn" onclick="YellowLedOnAjax()">照明ON</button>
				<button class="Btn" onclick="YellowLedOffAjax()">照明OFF</button>				
			</section>
			
			<!-- 区切り線 -->	
			<hr />
			

		</article>
		
		<!-- フッター -->
		<?php include("./_php/footer.php"); ?>
	</body>
</html>
