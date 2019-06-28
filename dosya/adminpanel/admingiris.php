<?php
include ( "baglanti.php" );
ob_start();
session_start();
$kadi = $_POST [ 'username' ];
$sifre = $_POST [ 'password' ];
$sql_check = mysql_query( "select * from tbl_admin where KULLANICIAD='" . $kadi . "' and SIFRE='" . $sifre . "' " ) or die (mysql_error());
if (mysql_num_rows( $sql_check ))  {
     $_SESSION [ "login" ] = "true" ;
     $_SESSION [ "username" ] = $kadi ;
     $_SESSION [ "password" ] = $sifre ;
     header( "Location:../adminpanel/adminpanel.php" );
}
else {
     if ( $kadi == "" or $sifre == "" ) {
         echo "Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! " ;
     }
     else {
         echo "Kullanici Adi/Sifre Yanlis." ;
     }
}
ob_end_flush();
?>
