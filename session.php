<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'test_db');
   
   $db = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysql_query($db,"select username from login where username = '$user_check' ");
   
   $row = mysql_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("Location: profile.php");
   }
   else{echo('first login to open your profile');exit;}
   
   session_destroy();
?>
