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
<div id="yazi"><strong>ILETISIM</strong></div>
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
<div id="genelc">
	<table width="100%" border="0">
		<tr>
			<th>ID</th>
			<th>Kullanıcı Adı</th>
			<th>Mesaj</th>
			<th>Sil</th>

		</tr>
	<?php
		$sorgu=mysql_query("SELECT * FROM `tbl_mesaj` ORDER BY `msjid` DESC");
		while($p=mysql_fetch_object($sorgu))
		{ ?>

			<tr align="center" >
			<td height="50"><?php echo $p->msjid; ?></td>
			<td><?php echo $p->msjad; ?></td>
			<td><?php echo $p->msj; ?></td>
					<td><a href="silil.php?id=<?php echo $p->msjid; ?>"><img src="../foto/delete.svg" width="30" height="30"></a></td>

		</tr>

		<?php
		}
		?>



	</table>
	</div>
</div>
</body>
</html>
