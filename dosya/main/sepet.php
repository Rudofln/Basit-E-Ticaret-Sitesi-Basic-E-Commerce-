<!DOCTYPE html><?php
include("baglanti.php");?>
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
		<div id="sepet">
				<img src="../foto/sepet.png" height="20" width="20"><b><a href="../main/sepet.php">Sepet</a></b>
		</div>
		<div id="sepet">
				<img src="../foto/sepet.png" height="20" width="20"><b><a href="sepet.php">Sepet</a></b>
		</div>
	</div>
	<div id="yer">
		<a id="yero" href="sepet.php">Sepet</a>
	</div>
<div id="spet">
	<?php

if(isset($_GET['islem']) && $_GET["islem"] == "cikar" ){
  $id = isset($_GET["id"]) ? intval($_GET["id"]) : false;
  if($id && isset($_COOKIE['urun']) && isset($_COOKIE['urun'][$id])){
    setcookie('urun['.$id.']',$id, time() - 86400,"/");
    echo '<script>location.href = "sepet.php";</script>';

  }

}

$sepettekiUrunler = array();

if(isset($_COOKIE["urun"])){
  foreach ($_COOKIE["urun"] as $key => $value) {
    $sepettekiUrunler[] = $value;
  }
}

$idLer = implode(",", $sepettekiUrunler);

  if(count($sepettekiUrunler) > 0){
  ?>


               <td>
<br>

                <table align="center" width="100%">
                  <tr>
											<th>Ürün Kodu</th>
                      <th>Ürün Adı</th>
                      <th>Kategori</th>
                      <th>Fiyat</th>
                      <th>Sepet</th>
                    </tr>
                    <?php
                   $toplam = 0;
									 $kitaplar=mysql_query("SELECT * FROM tbl_urunler WHERE ID IN (".$idLer.") ORDER BY ID DESC");
									 while($p=mysql_fetch_object($kitaplar))
									 {
										 ?>
											 <tr align="center">
										 <td><?php echo $p->ID; ?></td>
										 <td><?php echo $p->URUNAD; ?></td>
										 <td><?php echo $p->KATEGORI; ?></td>
										 <td><?php echo $p->SATISFIYAT; ?></td>
									 <td><a href="?islem=cikar&id=<?php echo $p->ID;?>">Sepetten Çıkar</a></td>

									 </tr>
<?php


$toplam += $p->SATISFIYAT;
} ?>

							 </table>


							 <?php




 if($_POST){

        $SPAD = $_POST["SPAD"];
				$SPSOY = $_POST["SPSOY"];
        $SPTEL = $_POST["SPTEL"];
				$SPMAIL = $_POST["SPMAIL"];
        $SPADRES = $_POST["SPADRES"];
				$sorgu2 = false;
        $eklenenKitaplar = array();
        if($SPAD AND $SPSOY AND $SPTEL AND $SPADRES){
					foreach ($sepettekiUrunler as $key => $val) {

								 $sorgu2=mysql_query("INSERT INTO `tbl_siparis` (`SPAD`, `SPSOYAD`, `SPTEL`, `SPMAIL`, `SPADRES`, `SPURUN`) VALUES ('{$SPAD}','{$SPSOY}','{$SPTEL}','{$SPMAIL}','{$SPADRES}','{$val}');");

									 if($sorgu2){
										$eklenenKitaplar[] = 1;
									 }

									}


						if(count($eklenenKitaplar) == count($sepettekiUrunler)){

							foreach ($_COOKIE['urun'] as $key => $val) {
								 setcookie('urun['.$key.']',$key, time() - 86400,"/");
							}

							mysql_query("UPDATE `tbl_urunler` SET `adet` = adet-1 WHERE ID IN (".$idLer.")");
							echo '<script>alert("Başarı ile Eklendi."); location.href = "urunler.php";</script>';

						}else {
							echo '<script>alert("Eklenmedi."); location.href = "urunler.php";</script>';
						}

							}




					}
                ?>



                  <form method="POST">
                  Adınız:<br>
                  <input type="text" name="SPAD" maxlength="33"><br>
                  Soyadınız:<br>
                  <input type="text" name="SPSOY" maxlength="33"><br>
                  Telefon Numaranız:<br>
                  <input type="text" name="SPTEL" maxlength="11"><br>
                  E-Posta:<br>
                  <input type="text" name="SPMAIL" maxlength=""><br>
									Adresiniz:<br>
                  <input type="text" name="SPADRES" maxlength=""><br>
                  Kart Numaranız: <br>
                  <input type="text" name="" placeholder="5555-5555-5555-5555"><br><br>
                  <button type="submit" name="btnkaydet">Satın Al</button>
                  </form>





               </td>
               <?php }else { ?>
                <script>location.href = "urunler.php";</script>
              <?php } echo "TOPLAM = ".$toplam; ?>
            </tr>
         </table>
         <br>
	</div>
</div>
</div>
</body>
</html>
