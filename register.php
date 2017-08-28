<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="form_css.css" rel="stylesheet" />
   
   <body>
      <?php
         if(isset($_POST['add'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            if(! get_magic_quotes_gpc() ) {
               $username = addslashes ($_POST['username']);
               $password = addslashes ($_POST['password']);
            }else {
               $username = $_POST['username'];
               $password= $_POST['password'];
            }
            
            
            
            $sql = "INSERT INTO login ". "(username,password) ". "VALUES('$username','$password')";
               
            mysql_select_db('test_db');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            
			echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('data successfully entered,you are now a member:)')
				</SCRIPT>");
            
            mysql_close($conn);
         }else {
            ?>
            
			<div class="back">
			 <h2 style="color:#FFFFFF;">Enter data in Database Through form</h2>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "250" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "250" ><p style="color:white;">Username&#160;</p></td>
                        <td><input name = "username" type = "text" 
                           id = "username" placeholder="Username"></td>
                     </tr>
                  
                     <tr>
                        <td width = "250" ><p style="color:white;">Password&#160;</p></td>
                        <td><input name = "password" type = "text" 
                           id = "password" placeholder="password"></td>
                     </tr>
                  
                     
                  
                     
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Submit">
                        </td>
                     </tr>
                  
                  </table>
	
               </form>
            
            <?php
         }
      ?>
   
  </div>
<a href="index1.php">Go to login page</a></br>
<a href="index.html">Home page</a>
</body>
</html>
