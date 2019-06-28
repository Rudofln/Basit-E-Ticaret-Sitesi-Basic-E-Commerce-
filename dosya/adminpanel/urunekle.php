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
	<div id="yazi"><strong>Ürün EKLE</strong></div>
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
		<form action="uruneklee.php" method="POST" enctype="multipart/form-data">
			<table style="width:600px">
  <tr>
    <td >Kategori Giriniz :</td>
    <td>
			<select name="talep">
			<?php
			$gel=mysql_query("select * from tbl_kategori");
			while($q=mysql_fetch_assoc($gel)){
			echo '<option value="'.$q['KATEGORIAD'].'">'.$q['KATEGORIAD'].'</option>';
			}
			 ?>
			</select></td>
  </tr>
  <tr>
    <td>Ürün Adı Giriniz :</td>
    <td><input type="text" name="ad"id="ad" placeholder="Ürün Adı Giriniz.."></td>
  </tr>
  <tr>
    <td>Ürün Yılını Giriniz :</td>
    <td><input type="text" name="yil" id="yil" placeholder="Ürün Yıl Giriniz.."></td>
  </tr>
	<tr>
    <td>Ürün Adet Giriniz :</td>
    <td><input type="text" name="adet" id="adet" placeholder="Ürün Adet Giriniz.."></td>
  </tr>
	<tr>
    <td>Ürün Fiyat Giriniz :</td>
    <td><input type="text" name="fiyat" id="fiyat" placeholder="Ürün Fiyatını Giriniz.."></td>
  </tr>
	<tr>
		<td>Ürün Detay Giriniz :</td>
		<td><input type="text" name="detay" id="detay" placeholder="Ürün Detay Giriniz.."></td>
	</tr>
	<tr>
		<td>Ürün Fotoğrafı Giriniz :</td>
		<td><input type="file" name="resim"/></td>
	</tr>
   <tr>
    <td></td>
    <td><button type="submit" name="giris">KAYDET</button></td>
  </tr>
</table>
        </form>
	</div>

</div>
</body>
</html>
