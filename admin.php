<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    
    
   </head>
     
<body>
<div id = 'thePage'> 
	<script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code

function createMatch(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
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
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('thePage');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	var matchName = document.getElementById('matchName').value;
	//matchName = removeSpaces(matchNames); 
	var creation = document.getElementById('ajaxDiv').value;
		creation = "match created";

	var matchNameForDisplay = document.getElementById('matchName').value;
	    
		
	var queryString = "?matchName=" + matchName +"&matchNameForDisplay="+ matchNameForDisplay;
	ajaxRequest.open("GET", "createMatch.php" + queryString, true);
	ajaxRequest.send(null);
}

   
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



function postCommentary(){
var ajaxRequest;  // The variable that makes Ajax possible!
	
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
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('currentCommentary');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	var matches = document.getElementById('matches').value;
	//matchName = removeSpaces(matchNames); 
	var commentary = document.getElementById('commentary').value;
	    
		
	var queryString = "?matches=" + matches +"&commentary="+ commentary ;
	ajaxRequest.open("GET", "postCommentary.php" + queryString, true);
	ajaxRequest.send(null);
}

function removeSpaces(string) {
 			 return string.split(' ').join('');
			 }
//-->
</script>
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	
	<h1>Match Commentary</h1>
	<h2>New Match</h2>
  <form>
  		
		<b> Match Name:</b><br/>
		<input type = 'text' name = 'matchName' id='matchName' value ='' >
		<p><input type = 'button' onclick = 'createMatch()',  value= 'create match' ><div id ='ajaxDiv'></div></p>
		
		
  </form>
  <hr></hr>
  
  <form name = "myForm">
<div id ="selection">  
<select name="matches" id ="matches" onchange="showMatches(this.value)">
<option value="">select match</option>

<?php
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
//echo "<option value=" ">select match</option>";
while($row = mysql_fetch_array($rs))
{
  echo "<option value='".$row[0]."'>$row[0]</option>\n";
 //echo "$row[0]";	
}
?>

</select> 
</div> 
 </br>
 <div id='currentCommentary'>Current commentary for selected match shown here...</div>
  </form>
  </br>
  <br/>
  <h3>Add Commentary</h3>
  <textarea id ='commentary' rows = '10' cols = '40' >Type commentary here...</textarea></br>
  <button type = 'button' onclick = 'postCommentary()'>submit</button>
</div>  
</body>

</html>

