<!DOCTYPE html>
<html>
<head>
	<title>Beyaz Eşya Script</title>
	<link rel="stylesheet" type="text/css" href="../css/stils.css?<?php echo time(); ?>">
	<link rel="icon" href="../foto/a.ico" type="image/x-icon" />
	<meta charset="utf-8">
</head>
<body>
<div id="hepsi">
	<div id="banner">
		<div id="logo"><a href="index.php"><img src="../foto/logob.png"></a></div>
		<div id="menu">
			<ul>
				<li><a id="uru" href="urunler.php"><b>URUNLER</b></a></li>
				<li><a id="kam" href="kampanya.php"><b>KAMPANYA</b></a></li>
				<li><a id="il" href="iletisim.php"><b>ILETISIM</b></a></li>
			</ul>
		</div>
	</div>
	<div id="yer">
		<a id="yero" href="iletisim.php">İletişim</a>
	</div>
		<div id="geneli">
			  <form action="" method="POST">
			<table align="center"width="450">
			<tr>
			<td align="center">Adınız Ve Soyadınız</td>

			<td><input type="text" id="username" name="se" size="20"></td>
			</tr>
			<tr>
			<td align="center">Mesajınız</td>
			<td><textarea rows="5" cols="35" name="mesaj"></textarea></td>
			</tr>
			<tr>
			<td></td>
			<td align=right><input type="submit" value="Mesaj Gönder"></td>
			</tr>
			</table>
			</form>
			<?php
			    if($_POST){
			    $se = $_POST['se'];
			    $mesaj = $_POST['mesaj'];
			    if($se== ""|| $mesaj==""){
			      echo "Lütfen boş alan bırakmayınız.";
			      }else{error_reporting(0);
			        include("baglanti.php");
			        $ekle = mysql_query("INSERT INTO tbl_mesaj(msjad,msj) VALUES('$se','$mesaj')");
			        if ($ekle) {
			          echo "Ekleme Başarılı";
			          header("Refresh: 1; url=iletisim.php");
			        }else{
			          echo "Boş Bırakmayınız.<br>";
			          echo "Tekrar denemeniz için geri gönderiliyosunuz";
			          header("Refresh: 1; url=iletisim.php");;
			        }
			      }
			    }
			     ?>
	</div>
</div>
</body>
</html>
