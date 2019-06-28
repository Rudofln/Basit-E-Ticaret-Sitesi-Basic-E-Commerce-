<!DOCTYPE html>
<html>
<head>
	<title>Beyaz Eşya Script</title>
	<link rel="stylesheet" type="text/css" href="../css/stils.css?<?php echo time(); ?>">
	<link rel="icon" href="../foto/a.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

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
		<div id="sepet">
			<a href="?bosalt=true">Sepeti Boşalt</a>
			<img src="../foto/sepet.png" height="20" width="20"><b><a href="../main/sepet.php"> SEPET ( <?php echo count(@$_COOKIE["urun"]); ?> ) </b>
		</div>
	</div>
	<div id="yer">
				<a id="yero" href="index.php">Anasayfa</a>
	</div>
	<div id="slayt">
				<div class="bxslider">
  						<div align="center" id="bir"><img src="../foto/1.jpg" title="Beyaz Eşyada Büyük İndirim"></div>
  						<div align="center" id="iki"><img src="../foto/2.jpg" title="Beyaz Eşyada Büyük İndirim"></div>
  						<div align="center"><img src="../foto/3.jpg" title="Beyaz Eşyada Büyük İndirim"></div>
  						<div align="center" id="dort"><img src="../foto/4.jpg" title="Beyaz Eşyada Büyük İndirim"></div>
				</div>
   			 	<script>
    					$(function(){
  						$('.bxslider').bxSlider({
    						mode: 'fade',
    						captions: true,
    						slideWidth: 600,
  						});
						});
    			</script>
	</div>
						<div id="oneri">
									<b>SIZIN ICIN</b> Oneriler
						</div>
						<?php

					if (isset($_GET['islem']) && $_GET['islem'] == "satis" ){
												 $id=$_GET['id'];
												 setcookie('urun['.$id.']',$id, time() + 86400);
													echo '<script>location.href = "index.php";</script>';
								}
					if(isset($_GET['bosalt']) ){
					foreach ($_COOKIE['urun'] as $key => $val) {
						 setcookie('urun['.$key.']',$key, time() - 86400);
					}
					 echo '<script>location.href = "index.php";</script>';
					}

					?>
						<div id="kurunler">
							<table> <tr align="center" >
							<?php
							include("baglanti.php");
							$sayfada = 6;
							$sorgu = mysql_query('SELECT COUNT(*) AS toplam FROM tbl_urunler');
							$sonuc = mysql_fetch_assoc($sorgu);
							$toplam_icerik = $sonuc['toplam'];
							$toplam_sayfa = ceil($toplam_icerik / $sayfada);
							$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
							if($sayfa < 1) $sayfa = 1;
							if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
							$limit = ($sayfa - 1) * $sayfada;
							                              	$sorgu=mysql_query('SELECT * FROM tbl_urunler LIMIT ' . $limit . ', ' . $sayfada);
							                                while($p=mysql_fetch_object($sorgu)){ ?>
							                                    <td><?php  echo "<div id=\"kurun\">";
																									echo '<img src="data:image/jpeg;base64,'.base64_encode( $p->FOTO).'" width="250" height="75%"/>';
																									echo "Urun Adı = ".$p->URUNAD."<br>";
																									echo "Urun Detay = ".$p->DETAY."<br>";
																									echo "Fiyat = ".$p->SATISFIYAT."<br><br>";
																										?><a href="?islem=satis&id=<?php echo $p->ID; ?>">SEPETE EKLE</a><br>
																										<a href="kampanya.php">Detaylı Gör</a>
																										<?php
																								 	echo "</div>";?></td>


																									<?php
}
																										?>
 </tr>

 <div id=siralama>
 	<strong>
 			<?php
 			for($s = 1; $s <= $toplam_sayfa; $s++) {
 			   if($sayfa == $s) {
 			       echo ''. $s . ' -';
 			   } else {
 			      echo '<a href="?sayfa=' . $s . '">' . $s . '</a> ';
 			   }
 			} ?></div></strong>
							  </table>
</div>
</div>
</body>
</html>
