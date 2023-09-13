<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "db_maindata";
$connect = mysqli_connect($host, $user, $pw, $db);

if(!$connect){
    die("Connection aborted!". mysqli_connect_errno());
}//else{
    //echo "Connected";
//}
?>