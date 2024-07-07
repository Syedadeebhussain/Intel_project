<?php
error_reporting(0);
$server = "localhost";
$username = "root";
$password = "";
$database = "doctor";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn)
{
    echo "success";
}
