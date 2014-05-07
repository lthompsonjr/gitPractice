<p><select name="matches" id ="matches" onchange="showMatches(this.value)">
<?php
$matches = $_GET['matches'];
if($matches != "" )
{
echo "<option value='".$matches."'>$matches</option>";



$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "matchdb";

	//Connect to MySQL Server
$con = mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname, $con) or die(mysql_error());

$sql = "SHOW TABLES FROM $dbname";

$rs = mysql_query($sql);
//get names of matches and fill drop-down
while($row = mysql_fetch_array($rs))
{
  if($row[0] != $matches){
  echo "<option value='".$row[0]."'>$row[0]</option>\n";
 	}
}
}
?>
</select></p>

