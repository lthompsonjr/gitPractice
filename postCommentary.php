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
$matchName = $_GET['matches'];
$commentary = $_GET['commentary'];

$matchName = mysql_real_escape_string($matchName);
$commentary = mysql_real_escape_string($commentary);


mysql_query("INSERT INTO `$matchName` (commentary,timestamp1) VALUES
('".$commentary."', CURRENT_TIMESTAMP() )");

$sql = "SELECT timestamp1 FROM `$matchName` ORDER BY `id` DESC";
$result = mysql_query($sql);

$sqls = "SELECT commentary FROM `$matchName` ORDER BY `id` DESC";
$results = mysql_query($sqls);

echo "Current commentary for: <h3>$matchName</h3>";
?>
</br></br>
<?php while  ( ($rows = mysql_fetch_row($results)) && ($row = mysql_fetch_row($result)) ): ?>
<?php echo "<b>$row[0] :</b> $rows[0]";?>
<hr></hr>
<?php endwhile;?>

