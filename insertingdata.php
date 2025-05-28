<?php
$server = "localhost";  
$username = "root";
$passwrd = "";
$database = "affan3";


$conn = mysqli_connect($server, $username, $passwrd, $database);    


if (!$conn){
    die("connection failed : ".mysqli_connect_error());
}

echo "connected successfully <br>";


$name = "khsan";
$empno = 14;

$sql = "INSERT INTO `table2` (`id`, `name`, `Emp.no`, `Age`) VALUES ('5', '$name', '12', '$empno')";

$Result = mysqli_query($conn, $sql);

if($Result){
    echo "data inserted successfully <br>";
}
else{
    echo "Error inserting data: " . mysqli_error($conn);
}


?>