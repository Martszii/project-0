<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));

	if(mysql_query("INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
	{
		?>
        <script>alert('Sikeres regisztráció ');</script>
        <?php
				header('Location: home.php');
	}
	else
	{
		?>
        <script>alert('Hiba regisztráció közben...');</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Regisztráció</title>
<link rel="shortcut icon" type="image/x-icon" href="img/colt.png" />

<link rel="stylesheet" href="css/style.css" type="text/css" />

</head>
<body class="background">
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="Felhasználónév" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="E-mail" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Jelszó" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Regisztrálok</button></td>
</tr>
<tr>
<td style="font-family:arial; color:#00a2d1">Van már felhasználód? <a href="index.php">Jelentkezz be!</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
