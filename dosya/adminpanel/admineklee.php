<meta charset="utf-8">
<?php
    if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username== ""|| $password==""){
      echo "Lütfen boş alan bırakmayınız.";
      }else{error_reporting(0);
        include("baglanti.php");
        $ekle = mysql_query("INSERT INTO tbl_admin(KULLANICIAD,SIFRE) VALUES('$username','$password')");
        if ($ekle) {
          echo "Ekleme Başarılı";
          header("Refresh: 1; url=adminekle.php");
        }else{
          echo "Boş Bırakmayınız.<br>";
          echo "Tekrar denemeniz için geri gönderiliyosunuz";
          header("Refresh: 1; url=adminekle.php");;
        }
      }
    }
     ?>
