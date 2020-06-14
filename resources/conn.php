<?php

$servername = "localhost";
$serveruser = "root";
$serverpwd = "" ;
$dbname = "train";

$conn = mysqli_connect($servername , $serveruser , $serverpwd, $dbname);

if(!$conn)
{
    echo "Connection Failed";
}

?>