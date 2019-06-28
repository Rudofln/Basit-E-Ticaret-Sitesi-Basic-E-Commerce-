<meta charset="utf-8">
<?php
include("ayar.php");
session_start();
ob_start();
if(($_POST["username"]==$user) and ($_POST["password"]==$pass)){
$_SESSION["login"] = "true";
$_SESSION["user"] = $user;
$_SESSION["pass"] = $pass;
header("Location:adminpanel.php");
}else{
echo "Kullancı Adı veya Şifre Yanlış.<br>";
echo "Giriş sayfasına yönlendiriliyorsunuz.";
header("Refresh: 2; url=adminpanelgiris.php");
}
if(($_POST["username"]==$users) and ($_POST["password"]==$passs)){
$_SESSION["login"] = "true";
$_SESSION["users"] = $users;
$_SESSION["passs"] = $passs;
header("Location:adminpanel.php");
}else{
echo "Kullancı Adı veya Şifre Yanlış.<br>";
echo "Giriş sayfasına yönlendiriliyorsunuz.";
header("Refresh: 2; url=adminpanelgiris.php");
}

ob_end_flush();
?>