<?php

if ($_GET)
{

include("baglanti.php");

if (mysql_query("DELETE FROM tbl_urunler WHERE ID =".(int)$_GET['id']))
{
   header("location:urunliste.php");
}
}

?>
