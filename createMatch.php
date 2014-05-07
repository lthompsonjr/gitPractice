<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "matchdb";
	//Connect to MySQL Server
$con = mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname, $con) or die(mysql_error());
	// Retrieve data from Query String
$matchName = $_GET['matchName'];
$matchNameForDisplay = $_GET['matchNameForDisplay'];

$matchName = mysql_real_escape_string($matchName);

$sql = "CREATE TABLE `$matchName`

(`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `matchName` VARCHAR(250) NOT NULL,
  `commentary` TEXT NOT NULL,
  `timestamp1` timestamp NOT NULL default CURRENT_TIMESTAMP) ENGINE = InnoDB;";


mysql_query($sql,$con);

mysql_query("INSERT INTO `$matchName` (matchName, commentary) VALUES
('$matchNameForDisplay','Hello, welcome to match commentary')");

mysql_close();

header("location: admin.php");
 ?>




