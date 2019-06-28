<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css/kayi.css?<?php echo time(); ?>">
</head>
<body>
<div id="all">
	<div id="banner">

		<div id="litebanner">
			<a href="adminpanel.php">Beyaz Eşya Sitesi Yönetimi</a>
		</div>


		<div id="orange">

		</div>

	</div>
	<div id="yazi"><strong>Admin Paneline GIRIS</strong></div>
	<div id="geneli">
		<form action="admingiris.php" method="POST">
<table align="center">
<tr>
<td>Kullanici Adi</td>
<td>:</td>
<td><input type="text" name="username"></td>
</tr>
<tr>
<td>Sifre</td>
<td>:</td>
<td><input type="password" name="password"></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="Giris"></td>
</tr>
</table>
</form>
	</div>

</div>
</body>
</html>
