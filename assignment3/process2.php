
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $Pass1 = $_POST['Pass'];
    $ConfirmPassword = $_POST['ConfirmPassword'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $zip = $_POST['zip'];
    $mobile = $_POST['mobile'];




$server = "localhost";
    $username = "root"; 
    $Pass = "";
    $database = "form"; 

    $conn = mysqli_connect($server, $username, $Pass,$database);

    $sql = "INSERT INTO `form` (`firstname`, `lastname`, `Address`, `email`, `Pass`, `ConfirmPassword`, `Gender`, `dob`, `Age`, `Zipcode`, `Mobilenumber`, `timestamp`) 
VALUES ('$firstname', '$lastname', '$address', '$email', '$Pass1', '$ConfirmPassword', '$gender', '$dob', '$age', '$zip', '$mobile', current_timestamp())";


    $RESULT = mysqli_query($conn, $sql);

    if($RESULT){
      header("Location: index.php");
    exit(); // Always call exit after header redirection
    }
    else{
      echo "Error creating table: " . mysqli_error($conn);
    }
}

?>
