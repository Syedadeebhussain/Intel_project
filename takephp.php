<?php
error_reporting(0);
$server = "localhost";
$username = "root";
$password = "";
$database = "insurance";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn)
{
    echo "error";
}

?>