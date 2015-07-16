
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/proba.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/screenstyle.css">
  <link rel="stylesheet" type="text/css" href="css/screen_layout_large.css">
  <link rel="stylesheet" type="text/css" href="css/screen_layout_small.css" media="only screen and (min-width:50px) and (max-width:500px)">
  <link rel="stylesheet" type="text/css" href="css/screen_layout_medium.css" media="only screen and (min-width:501px) and (max-width:800px)">
  <!-- [if lt IE 9] -->
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <!-- [endif] -->
  <script src="audiojs/audio.min.js"></script>
  <script>
  audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });
</script>
  <meta http-equiv='content-type' content="text/html" ; charset="utf-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
  <title>Hírek</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/colt.png" />

</head>
<body background-image=>
  <div style="display:none;" class="nav_up" id="nav_up"></div>
  <div style="display:none;" class="nav_down" id="nav_down"></div>


  <script src="jquery-1.3.2.js" type="text/javascript"></script>
  <script src="scroll-startstop.events.jquery.js" type="text/javascript"></script>
  <div class="page">
    <header>

      <a class="logo" href="#"></a>
    </header>

    <?php
    if(!mysql_connect("localhost","root",""))
    {
    	die('Hoppá kapcsolódási hiba ! --> '.mysql_error());
    }
    if(!mysql_select_db("news"))
    {
    	die('Nem találom az adatbázist ! --> '.mysql_error());
    }
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT * FROM `news` ORDER BY date DESC";
    $run = mysql_query($query);



     ?>

    <div class="la">
    <div class="lahead"><h2>Legfrissebb hírek</h2></div>
    <div class="labody">

      <?php
      while($row = mysql_fetch_array($run)) {
      $id = $row['id'];
      $title = $row['title'];
      $description = $row['description'];
      $date = $row['date'];
     ?>
    <div class="lapost">

    <div id="lada"class="laposthead"> <?php echo $title; ?></div>
    <div id="lad" class="lapostbody">
    <?php echo $description; ?><br><br>
    <?php echo $date; ?>

    </div>
    </div>

    <?php } ?>


    </div>
    </div>


    <nav>
      <a href="home.php">Főoldal</a>
      <a href="video.php">Videó</a>
      <a href="webshop\products.php">Webshop</a>
      <a href="conatact.php">Kapcsolat</a>

    </nav>

    <footer>&copy; Tóta Benjámin & Uti Marcell
    <script>
      $( document ).ready(function() {
        // NOTE: scroll

        $(function() {
        	// the element inside of which we want to scroll
                var $elem = $('');

                // show the buttons
        	$('#nav_up').fadeIn('slow');
        	$('#nav_down').fadeIn('slow');

                // whenever we scroll fade out both buttons
        	$(window).bind('scrollstart', function(){
        		$('#nav_up,#nav_down').stop().animate({'opacity':'0.2'});
        	});
                // ... and whenever we stop scrolling fade in both buttons
        	$(window).bind('scrollstop', function(){
        		$('#nav_up,#nav_down').stop().animate({'opacity':'1'});
        	});

                // clicking the "down" button will make the page scroll to the $elem's height
        	$('#nav_down').click(
        		function (e) {
        			$('html, body').animate({scrollTop: $elem.height()}, 1000);
        		}
        	);
                // clicking the "up" button will make the page scroll to the top of the page
        	$('#nav_up').click(
        		function (e) {
        			$('html, body').animate({scrollTop: '0px'}, 800);
        		}
        	);
         });
        });
        </script>


    </footer>
</div>
</body>

</html>
