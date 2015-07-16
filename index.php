<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$res=mysql_query("SELECT * FROM users WHERE email='$email'");
	$row=mysql_fetch_array($res);

	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('Rossz adatok');</script>
        <?php
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="shortcut icon" type="image/x-icon" href="img/colt.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bejelentkezés</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body class="background">
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="E-mail" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Jelszó" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Bejelentkezés</button></td>
</tr>
<tr>
<td><a href="register.php">Regisztráció</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
