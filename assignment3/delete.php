<?php

include 'conn.php';

$id  = $_REQUEST['id'];



// $sql = "DELETE FROM form WHERE id = '$id'";

$sql = "UPDATE form set status= '0'  WHERE id = '$id'";

mysqli_query($conn,$sql);
if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit(); // Always call exit after header redirection
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}