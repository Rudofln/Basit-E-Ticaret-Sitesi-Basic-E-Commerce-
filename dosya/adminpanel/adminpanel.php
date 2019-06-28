
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
	<div id="yazi"><strong>Admin Paneline Hosgeldiniz</strong></div>
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
	<div id="genelii">
	<a href="adminekle.php"><div id="row"><div id="kass">Admin Ekle</div><img src="../foto/k.png" height="200" width="200"></div></a>
	<a href="urunekle.php"><div id="rowt"><div id="kassk">Ürün Ekle</div><img src="../foto/se.jpg" height="200" width="200"></div></a>
	<a href="slite.php"><div id="rowt"><div id="kassss">Admin Listeleme</div><img src="../foto/list.png" height="170" width="200"></div></a>
	<a href="slitk.php"><div id="rowt"><div id="kassss">Ürün Listeleme</div><img src="../foto/list3.png" height="170" width="200"></div></a>
	<a href="iletisim.php"><div id="rowt"><div id="kasss">İletişim</div><img src="../foto/iletisim.png" height="200" width="200"></div></a>
	</div>
</body>
</html>
