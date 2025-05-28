<?php

$server = "localhost";
$username = "root";
$Pass = "";
$database = "affan2";

$conn = mysqli_connect($server, $username, $Pass, $database); ;

if (!$conn){
    die ("connection failed :". mysqli_connect_error());
}
echo "Connected successfully <br>";

$sql = "CREATE DATABASE AFFAN3";

$RESULT = mysqli_query($conn, $sql);
echo "datebase is ";
echo $RESULT;

if($RESULT)
{
    echo "Database created successfully";
}
else{
    echo "Error creating database: " . mysqli_error($conn);
}



?>