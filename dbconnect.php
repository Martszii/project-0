<?php
if(!mysql_connect("localhost","root",""))
{
	die('Hoppá kapcsolódási hiba ! --> '.mysql_error());
}
if(!mysql_select_db("dbtest"))
{
	die('Nem találom az adatbázist ! --> '.mysql_error());
}

?>
