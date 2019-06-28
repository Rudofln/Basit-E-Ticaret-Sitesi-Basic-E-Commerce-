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
	<div id="yazi"><strong>Admin Düzenle</strong></div>
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
	<?php
	$sonuc = mysql_query("SELECT * FROM tbl_admin WHERE ID =".(int)$_GET['id']);

	$sorgu =mysql_fetch_assoc($sonuc);
?>

<div id="geneli">
	<form action="" method="post">

	    <table class="table">

	        <tr>
	            <td>Kullanıcı Adı</td>
	            <td><input type="text" name="names" class="form-control" value="<?php echo $sonuc['KULLANICIAD'];?>">
	            </td>
	        </tr>

	        <tr>
	            <td>Şifre</td>
	            <td><input type="password" name="pass" class="form-control" value="<?php echo $sonuc['SIFRE'];?>"</td>
	        </tr>

	        <tr>
	            <td></td>
	            <td><input type="submit" value="Kaydet"></td>
	        </tr>

	    </table>

	</form>
	</div>
	<div>
	<?php

	if ($_POST) {

	    $names = $_POST['names'];
	    $pass = $_POST['pass'];

	    if ($names<>"" && $pass<>"") {

	        if (mysql_query("UPDATE tbl_admin SET KULLANICIAD = '$names', SIFRE = '$pass' WHERE ID =".$_GET['id']))
	        {
	            header("location:slite.php");
	        }
	        else
	        {
	            echo "Hata oluştu";
	        }
	    }
	}
	?>
</div>
</body>
</html>
