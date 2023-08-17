<?php 
 $hostname = "localhost";
 $username = "root";
 $pwd = "";
 $db_name =  "login_captcha";

 $con = mysqli_connect($hostname,$username,$pwd,$db_name);

 if(!$con)
 {
     die("Connection Failed:". mysqli_connect_error());
 }
?>
