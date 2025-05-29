<?php

include 'conn.php';

if(isset($_POST['login'])){
   $user =   mysqli_real_escape_string($conn,$_POST['email']);
   $pass = mysqli_real_escape_string($conn,$_POST['pass']);



   $sql = "SELECT email,Pass FROM form WHERE email='$user' AND Pass='$pass'";


    $check = mysqli_query($conn, $sql);

    $result = mysqli_fetch_assoc($check);
     $email =$result['email'];
        $password = $result['Pass'];



    

    if(mysqli_num_rows($check)>0){
        session_start();
        $_SESSION['email']= $email;
        $_SESSION['Pass'] = $password;

        header("Location: index.php");
    }
    else{
        header("Location: login.php");
        exit();
    }
}
