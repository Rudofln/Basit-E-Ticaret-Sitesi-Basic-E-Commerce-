
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css?<?php echo time(); ?>">
</head>
<body>
<div id="all">
	<div id="banner">

		<div id="litebanner">
			<a href="adminpanel.php">Beyaz Eşya Sitesi Yönetimi</a>
		</div>


		<div id="orange">
			<ul>
				<li><a id="uru"href="adminekle.php">Admin EKLE</a></li>
				<li><a id="uru"href="urunekle.php">Ürün EKLE</a></li>
				<li><a id="uru"href="urunliste.php">Ürün LISTELE</a></li>
				<li><a id="uru" href="slite.php">Admin LISTELE</a></li>
        <li><a id="uru" href="musteri.php">Müsteri LISTELE</a></li>
				<li><a id="uru" href="iletisima.php">Iletisim</a></li>
			</ul>
		</div>

	</div>
	<div id="yazi"><strong>Ürün Listeleme</strong></div>
	<?php
	include ( "baglanti.php" );
	ob_start();
	session_start();
	if (!isset( $_SESSION [ "login" ])){
	     header( "Location:../adminpanel/adminpanelgiris.php" );
	}
	else {
	  echo '<div id=admin>'."<strong>".$_SESSION["username"]."</strong>"." Hoşgeldin"."&nbsp&nbsp&nbsp&nbsp"."<a href=logout.php>Çıkış Yap</a>".'</div>';
	}
	?>
	<div id="geneli">
		<table width="100%" border="0" align="center">
			<tr>
				<th>ID</th>
				<th>Urun Adı</th>
				<th>Kategori</th>
				<th>Urun Yılı</th>
				<th>Urun Fiyatı</th>
				<th>Sil</th>
			</tr>
			<?php
			$sayfada = 10;

			$sorgu = mysql_query('SELECT COUNT(*) AS toplam FROM tbl_urunler');
			$sonuc = mysql_fetch_assoc($sorgu);
			$toplam_icerik = $sonuc['toplam'];

			$toplam_sayfa = ceil($toplam_icerik / $sayfada);
			$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
			if($sayfa < 1) $sayfa = 1;
			if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
			$limit = ($sayfa - 1) * $sayfada;
		 ?>


		<?php
																	$sorgu=mysql_query('SELECT * FROM tbl_urunler LIMIT ' . $limit . ', ' . $sayfada);
																		while($p=mysql_fetch_object($sorgu)){ ?>
																			<tr align="center" >
																				<td height="50"><?php echo $p->ID; ?></td>
																					<td><?php echo $p->URUNAD; ?></td>
																						<td><?php echo $p->KATEGORI; ?></td>
																						<td><?php echo $p->YIL; ?></td>
																				 	<td><?php echo $p->SATISFIYAT; ?></td>
																				<td><a href="silx.php?id=<?php echo $p->ID; ?>"><img src="../foto/delete.svg" width="30" height="30"></a></td>

			</tr>

			<?php
			  }
			  ?>


			</table>


<div id=siralama>
	<strong>
			<?php
			for($s = 1; $s <= $toplam_sayfa; $s++) {
			   if($sayfa == $s) {
			       echo ''. $s . ' -';
			   } else {
			      echo '<a href="?sayfa=' . $s . '">' . $s . '</a> ';
			   }
			} ?></div></strong></table>

</div>
</body>
</html>
