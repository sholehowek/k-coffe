<?php
$host = 'localhost';
$username = 'root';
$password = '';
$databasename = 'kcoffe';

$connection = mysql_connect($host, $username, $password);
mysql_select_db($databasename, $connection) ;
?>