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
		<div id="logo"><a href="../main/index.php"><img src="../foto/logob.png"></a></div>
		<div id="menu">
			<ul>
				<li><a id="uru" href="../main/urunler.php"><b>URUNLER</b></a></li>
				<li><a id="kam" href="../main/kampanya.php"><b>KAMPANYA</b></a></li>
				<li><a id="il" href="../main/iletisim.php"><b>ILETISIM</b></a></li>
			</ul>
		</div>
		<div id="sepet">
			<a href="?bosalt=true">Sepeti Boşalt</a>
			<img src="../foto/sepet.png" height="20" width="20"><b><a href="../main/sepet.php"> SEPET ( <?php echo count(@$_COOKIE["urun"]); ?> ) </b>
		</div>
	</div>
	<div id="yer">
		<a id="yero" href="../main/urunler.php">Ürünler</a> -> <a id="yero" href="setustuocak.php">Set Üstü Ocak</a>
	</div>
		<div id="bolum">
	<div id="birinci"></div>
	<div id="ikinci">
		<div id="kate">
			<div id="ya">Set Üstü Ocak</div>
		</div>
		<?php
		include("baglanti.php");
		$uruns = @$_GET["uruns"];
			if($uruns == "detay"){
					$id = intval($_GET["id"]);
					if($id){
			$sorgu3=mysql_query("SELECT * FROM `tbl_urunler` WHERE `ID` = '{$id}' LIMIT 1");

			$p3=mysql_fetch_object($sorgu3);



				 ?>
		<br><br>
		<table class="detaytablo" width="80%" border="0" align="center">
			<tr>
				<th>Kapak Resmi</th>
				<td><img src="data:image/jpeg;base64,<?php echo base64_encode( $p3->FOTO ); ?>" width="170" height="200"/></td>
			</tr>
						<tr>
							<th>Urun Adi : </th>
							<td><?php echo $p3->URUNAD;?></td>
						</tr>
						<tr>
							<th>Kategori Adi :</th>
							<td><?php echo $p3->KATEGORI;?></td>
						</tr>
						<tr>
							<th>Model Yılı :</th>
							<td><?php echo $p3->YIL;?></td>
						</tr>
						<tr>
							<th>Stok :</th>
							<td><?php echo $p3->ADET;?></td>
						</tr>
						<tr>
							<th>Fiyat(TL) :</th>
							<td><?php echo $p3->SATISFIYAT." ₺";?></td>
						</tr><tr>
							<th>Detay :</th>
							<td><?php echo $p3->DETAY;?></td>
						</tr>
		</table>
		<center style="font-size: 20px; padding: 15px;">
		<a href="setustuocak.php" style="background-color: #41b5d8; color:#284b65; padding: 5px; border-radius: 5px;"> GERİ GİT</a>
		</center>

	<?php } } else{?>
		<?php
			include("baglanti.php");
		$sayfada = 9;

		$sorgu = mysql_query("SELECT COUNT(*) AS toplam FROM tbl_urunler WHERE `KATEGORI` = 'SET USTU OCAK' ORDER BY `ID` DESC");
		$sonuc = mysql_fetch_assoc($sorgu);
		$toplam_icerik = $sonuc['toplam'];

		$toplam_sayfa = ceil($toplam_icerik / $sayfada);
		$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
		if($sayfa < 1) $sayfa = 1;
		if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
		$limit = ($sayfa - 1) * $sayfada;
		?>
		<?php
				$sql=mysql_query("SELECT * FROM tbl_urunler  WHERE `KATEGORI` = 'SET USTU OCAK' ORDER BY `ID` DESC LIMIT " . $limit . ", " . $sayfada);

				while($do=mysql_fetch_object($sql)){
					echo "<div id=\"kampanyauruns\">";
					echo '<img src="data:image/jpeg;base64,'.base64_encode( $do->FOTO).'" width="250" height="75%"/>';
					echo "Urun Adı = ".$do->URUNAD."<br>";
					echo "Urun Detay = ".$do->DETAY."<br>";
					echo "Fiyat = ".$do->SATISFIYAT." ₺"."<br><br>";
					?><a href="?islem=satis&id=<?php echo $do->ID; ?>">SEPETE EKLE</a><br>
					<a href="?uruns=detay&id=<?php echo $do->ID; ?>">Detaylı Gör</a>
					<?php
					echo "</div>";
}
			}
				?>
				<?php

					?>
					<div id=siralamac>
					<strong>
					<?php
					for($s = 1; $s <= $toplam_sayfa; $s++) {
						 if($sayfa == $s) {
								 echo ''. $s . ' -';
						 } else {
								echo '<a href="?sayfa=' . $s . '">' . $s . '</a> ';
						 }
					} ?></strong></div>
					</div>
				</div>
	</div>
	<div id="ucuncu">
	</div>
	</div>
</div>
</body>
</html>
