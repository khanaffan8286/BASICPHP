<?php 
 
 $conn = mysqli_connect('localhost','root','','form');
   $firstname = $_REQUEST['firstname'];
   $lastname = $_REQUEST['lastname'];
   $email = $_REQUEST['email'];
   $dob = $_REQUEST['dob'];
   $Address = $_REQUEST['address'];
   $id = $_REQUEST['id'];
   $email = $_REQUEST['email'];
      $Pass = $_REQUEST['Pass'];
      $ConfirmPassword = $_REQUEST['ConfirmPassword'];
      $Age = $_REQUEST['age'];
    $Gender = $_REQUEST['gender'];
   $Zipcode = $_REQUEST['zip'];
    $Mobilenumber = $_REQUEST['mobile'];



   



$sql = "UPDATE form set firstname = '$firstname' , lastname = '$lastname',email ='$email', Address ='$Address', Pass ='$Pass',ConfirmPassword =' $ConfirmPassword' , Age = '$Age' , Zipcode = '$Zipcode', Gender = '$Gender',dob= '$dob',Mobilenumber = '$Mobilenumber' WHERE id = '$id'";
mysqli_query($conn,$sql);

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit(); // Always call exit after header redirection
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
   
