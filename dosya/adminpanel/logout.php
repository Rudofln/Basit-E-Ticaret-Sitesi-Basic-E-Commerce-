<meta charset="utf-8">
<?php
session_start();
ob_start();
session_destroy();
echo "Çıkış Yaptınız. Ana Sayfaya Yönlendiriliyorsunuz";
header("Refresh: 2; url=../adminpanel/adminpanelgiris.php");
ob_end_flush();
?>
