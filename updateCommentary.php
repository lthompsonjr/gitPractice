
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
$matches = $_GET['matches'];
//order comment by time posted
$sql = "SELECT timestamp1 FROM `$matches` ORDER BY `id` DESC";
$result = mysql_query($sql);

$sqls = "SELECT commentary FROM `$matches` ORDER BY `id` DESC";
$results = mysql_query($sqls);


echo "Current commentary for: <h3>$matches".'</h3>';
?>

</br></br>

<?php 

while  ( ($rows = mysql_fetch_row($results)) && ($row = mysql_fetch_row($result)) ): ?>

<?php echo "<b>$row[0] :</b> $rows[0]";?>


<hr></hr>

<?php endwhile;?>


