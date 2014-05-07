<!-- Displays matches choices and commentary to user commentary is updated every five seconds-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    
    
   </head>
     <body> 
	<script language="javascript" type="text/javascript">
<!-- 



var cnt = window.setInterval("updateCommentary()", 5000);

//function used to update the commentary for matches   
function updateCommentary(){
var ajaxRequest;  

	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){

				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('currentCommentary');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
  
	var matches = document.getElementById('matches').value;
	if (matches=="")
  {
  document.getElementById("currentCommentary").innerHTML="Current commentary for selected match shown here...";
  return;
  }	

    var queryString = "?matches=" + matches;
	ajaxRequest.open("GET", "updateCommentary.php" + queryString, true);
	ajaxRequest.send(null);
	
}
//show current commentary for a chosen match 
function showMatches(str){
if (str=="")
  {
  document.getElementById("currentCommentary").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("currentCommentary").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","showMatches.php?matches="+str,true);
xmlhttp.send();

}

var ups = window.setInterval("updateSelect()", 5000);
function updateSelect(){
var ajaxRequest; 

	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	//function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('selection');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
  var matches = document.getElementById('matches').value;
	if (matches=="")
  {
  document.getElementById("currentCommentary").innerHTML="Current commentary for selected match shown here...";
  return;
  }	

    var queryString = "?matches=" + matches;
	ajaxRequest.open("GET", "updateSelect.php" + queryString, true);
	ajaxRequest.send(null);
	
//-->
</script>
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<h1>Match Commentary</h1>
  <hr></hr>
  
  <form name = "myForm">
  <h4>select a match from the drop-down to view commentary</h4>
 <div id = "selection">
  <p><select name="matches" id ="matches" onchange="showMatches(this.value)">
  
  
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "matchdb";
	//Connect to MySQL Server
$con = mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname, $con) or die(mysql_error());
//query to display the matches from the db
$sql = "SHOW TABLES FROM $dbname";

$rs = mysql_query($sql);
//echo "<option value=" ">select match</option>";
while($row = mysql_fetch_array($rs))
{
  echo "<option value='".$row[0]."'>$row[0]</option>\n";
 //echo "$row[0]";	
}
?>

</select></p>
</div>
 <p><div id='currentCommentary'>Current commentary for selected match shown here...</div></p>
  </form>
  </br>
  <br/>
  </body>
</html>
