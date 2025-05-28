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

// $sql = "CREATE DATABASE AFFAN3";

// $RESULT = mysqli_query($conn, $sql);
// echo "datebase is ";
// echo $RESULT;



$sql = "CREATE TABLE `affan2`.`table2` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(13) NOT NULL , `Emp.no` INT(14) NOT NULL , `Age` INT(100) NOT NULL , PRIMARY KEY (`id`)) ";

$RESULT = mysqli_query($conn,$sql);

if($RESULT)
{
    echo "Database created successfully";
}
else{
    echo "Error creating database: " . mysqli_error($conn);
}

?>