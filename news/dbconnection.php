<?php

$hostname="localhost";
$username="root";
$password="";
$dbname="getinfo";

$conn=mysqli_connect($hostname,$username,$password,$dbname);

if(!$conn){
    die ("database not connected");
}

?>