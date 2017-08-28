<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
.box
{
 background-color:#CCCCCC;
 height:300px;
 width:400px;
 border-radius:3px;
 
  }
input[type=text] {
    width: 200px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #0099FF;
	background-color:#CCCCCC;
	
}
input[type=password] {
    width: 200px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #0099FF;background-color:#CCCCCC;
}
input[type=submit] {
    width: 150px;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	
}

input[type=submit]:hover {
    background-color: #45a049;
}
</style>
</head>

<body>
<?php session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Username or password empty, please fill in to login!')
				</SCRIPT>");//$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("test_db", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
  header("location: tryagain1.php"); // $error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>

<center><div class="box">
<legend>LOG-IN HERE</legend> 
   <form method="post" action= "<?php $_PHP_SELF ?>" > User <br>
     <input type="text" name="username" size="40"><br> Password <br>
	 <input type="password" name="password" size="40"><br> <br>
	 <input id="button" type="submit" name="submit" value="Login"> 
   <p style="color:red"> Wrong username or password.Please try again!!</p></form> 
 
 </div></center>
</body>
</html>
