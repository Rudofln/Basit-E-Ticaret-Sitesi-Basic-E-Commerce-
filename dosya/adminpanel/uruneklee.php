<meta charset="utf-8">
<?php




    if($_POST){
    $ad = $_POST['ad'];
    $yil = $_POST['yil'];
    $adet = $_POST['adet'];
    $fiyat = $_POST['fiyat'];
    $kategori = $_POST['talep'];
    $detay = $_POST['detay'];
    $resim = $_FILES['resim'];
    if($ad== ""|| $yil==""|| $adet==""||$resim["tmp_name"] == ""){

      echo "Lütfen boş alan bırakmayınız.";
      }else{
        error_reporting(0);
        if(isset($resim["tmp_name"])){//resim ekleme
          $fp      = @fopen($resim["tmp_name"], 'r');
          $data = @fread($fp, filesize($resim["tmp_name"]));
          $resim = @addslashes($data);
          @fclose($fp);
        }
        include("baglanti.php");
        $ekle = mysql_query("INSERT INTO tbl_urunler(URUNAD,KATEGORI,YIL,ADET,SATISFIYAT,DETAY,FOTO) VALUES('$ad','$kategori','$yil','$adet','$fiyat','$detay','$resim')");
        if ($ekle) {
          echo "Ekleme Başarılı";
          header("Refresh: 1; url=urunekle.php");
        }else{
          echo "Boş Bırakmayınız.<br>";
          echo "Tekrar denemeniz için geri gönderiliyosunuz";
          header("Refresh: 1; url=urunekle.php");;
        }
      }
    }
     ?>
