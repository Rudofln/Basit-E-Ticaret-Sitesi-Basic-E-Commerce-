<?php

if ($_GET)
{

include("baglanti.php");

if (mysql_query("DELETE FROM tbl_mesaj WHERE msjid =".(int)$_GET['id']))
{
   header("location:slite.php");
}
}

?>
