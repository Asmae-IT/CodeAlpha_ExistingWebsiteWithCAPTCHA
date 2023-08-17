<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name= "memberscrud";

$con = mysqli_connect($hostname,$username,$password,$db_name);

if(!$con)
{
    die("Connection Failed:". mysqli_connect_error());
}
?>