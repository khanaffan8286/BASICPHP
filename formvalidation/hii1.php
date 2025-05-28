<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $Pass1 = $_POST['Pass1'];
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
      echo '<!-- Toast container -->
<div id="toast" class="fixed bottom-5 right-5 bg-green-100 text-green-800 p-4 rounded-lg shadow-lg flex items-start space-x-2 transition-opacity duration-300 opacity-0 pointer-events-none">
  <div>
    <h2 class="font-bold text-lg">Thank You!</h2>
    <p class="text-sm text-gray-700">Your message has been successfully submitted.</p>
  </div>
</div>
';
    }
    else{
      echo "Error creating table: " . mysqli_error($conn);
    }
}

?>


<h1> Thank You For Submiting the form</h1>