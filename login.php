<?php

error_reporting (E_ALL ^ E_NOTICE);
session_start();


?>
<html>

<head>
 	<title>Login Page</title>
</head>

<body>
<h1>Match Commentary</h1>
		<?php
			$form = "<form action ='login.php' method = 'post'>
					<table>
					<tr>
					<td>
					<h4>Administrators login below</h4>
					</td>
					</tr>
						<tr>
							<td>Username:</td>
						</tr>
						
						<tr>
							
							<td><input type = 'text' name = 'user'></td>
						</tr>
						<tr>	
							<td>Password</td>
						</tr>
						
						<tr>	
							<td><input type = 'password' name = 'password'></td>
						</tr>
						
						<tr>
							<td><input type = 'submit' name = 'loginButton' value = 'login'></td>
						</tr>
						
						<tr>
						 <td><hr></hr> </td>
						 </tr>
						 
						<tr>
						 <td>Not an administrator. <a href='publicUser.php'> Click here </a>to view match commentary.</td>
						 </tr>
			
					</table>
									

				</form>";

				if($_POST['loginButton']) 
				{
					$user = $_POST['user'];
					$password = $_POST['password'];
					
					if($user)//check if user has entered username 
					{
						if($password)//check if user has entered password
						{
							require("connect.php");//use conect file to connect to db
							$password = md5(md5($password));// encrypt password using md5 encryption
							
							//echo "$password";
							//query to match username given with that in the db
							$query = mysql_query("SELECT * FROM users WHERE username='$user'");
							$numrows = mysql_num_rows($query);
							if($numrows == 1)
							{
							  //grab password and compare
								$row = mysql_fetch_assoc($query);
								$dbid = $row['id'];
								$dbuser = $row['username'];
								$dbpass = $row['password'];
								//$dbactive = $row['$active']; // not nessecary can be used for registration and account activation
								
								if($password == $dbpass)
								{
								  $_SESSION['userid'] = $dbid;
								  $_SESSION['username'] = $dbuser;
								  
								  echo "Welcome <strong>$dbuser.</strong>  <a href = '/Match-Commentary_sys/admin.php'>Click here</a> to go to Admin page.";
								}
								else
									echo "you did not enter the password correctly. $form";
								
							}
							else
								echo "the user name you entered was not found. $form";
							mysql_close();//close db connection 
						}
						else 
							echo "you must enter a password. $form";

					}
					else
						echo "you did not enter a username. $form";
						

				}
				else 
					echo  "$form";
				

		?>
</body>

</html>