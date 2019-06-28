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
	<div id="yazi"><strong>Admin EKLE</strong></div>
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

<div id="genel">
  <form action="admineklee.php" method="POST">
<table align="center">
<tr>
<td>Kullanici Adi</td>
<td>:</td>
<td><input type="text" id="username" name="username"></td>
</tr>
<tr>
<td>Sifre</td>
<td>:</td>
<td><input type="password"  id="password" name="password"></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="EKLE"></td>
</tr>
</table>
</form>
</div>
</body>
</html>
