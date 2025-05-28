<?php

$servername = "localhost";
$username = "root";
$Pass = "";
$database = "affan3";


$conn = mysqli_connect($servername,$username, $Pass, $database);

if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}
else{
    echo "connected successfully";
}

$sql = "SELECT * FROM `table`";
$result = mysqli_query($conn, $sql);



?>