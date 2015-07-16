<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<!DOCTYPE html>
<html>

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="typeahead.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="img/colt.png" />



  <link rel="stylesheet" type="text/css" href="css/screenstyle.css">
  <link rel="stylesheet" type="text/css" href="css/screen_layout_large.css">
  <link rel="stylesheet" type="text/css" href="css/screen_layout_small.css" media="only screen and (min-width:50px) and (max-width:500px)">
  <link rel="stylesheet" type="text/css" href="css/screen_layout_medium.css" media="only screen and (min-width:501px) and (max-width:800px)">
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <!-- [if lt IE 9] -->
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <!-- [endif] -->

  <meta http-equiv='content-type' content="text/html" ; charset="utf-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
<title>Üdvözöllek - <?php echo $userRow['username']; ?></title>
</head>

<body >
  <div id="header">
  	<div id="left">
      </div>
      <div id="right">
      	<div id="content">
          	Szia, <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Kijelentkezés</a>
          </div>
      </div>
  </div>

  <div class="page">
    <header>
      <a class="logo" href="#"></a>
    </header>

    <article>
      <h1>Üdvözlünk</h1>
      <p>
        A fegyverek rengeteg embert vonzanak, sokan foglalkoznak velük rendszeres módon és tudnak ezekről minden apró részletet, ismerik a népszerűeket, de a kevésbé ismertekről is sok információval rendelkeznek. Most már saját légfegyver is beszerezhető a katonadolog.hu
        oldalon elérhető webáruház segítségével. Itt olyan légfegyverek találhatóak meg, amelyek a valódi fegyverek pontos mását képezik és ezekhez természetesen fellelhetőek a megfelelő léglövedékek is. </p>
    </article>

    <div class="promo_container">
      <div class="promo one">
        <div class="content">
          <h3>Légfegyverek</h3>
          <p>
            Engedély nélkül tartható 7,5J alatti légfegyverek, lőszerek, felszerelések, kiegészítők.
          </p>
          <p>
            <a class="cta" href="galery.php">Tovább a galériára</a>
          </p>
        </div>
      </div>

      <div class="promo two">
        <div class="content">
          <h3>Friss hírek</h3>
          <p>
            Új fegyverkiállítás Csongrádon.<br> Jogszabálymódosítás javaslatok az FVM felé. <br> Panzerfaust használati útmutató.
          </p>
          <p>
            <a class="cta" href="news.php">Cikkek</a>
          </p>
        </div>
      </div>

      <div class="promo three">
        <div class="content">
          <h3>A fegyvertartásról</h3>
          <p>
            Nagyon figyelmeztető jelenség az, hogy jóformán egyetlen állam sem engedi meg az általános és szabad fegyvertartást Európában. Mitől félnek, és kik félnek?
          </p>
          <p>
            <a class="cta" href="learn_more.php">Tudj meg többet</a>
          </p>
        </div>
      </div>

      <div class="clear-fix">

      </div>

    </div>
		<nav>
      <a href="home.php">Főoldal</a>
      <a href="video.php">Videó</a>
      <a href="webshop\products.php">Webshop</a>
      <a href="contact.php">Kapcsolat</a>

    </nav>

    <footer>&copy; Tóta Benjamin & Uti Marcell</footer>

</body>

</html>
