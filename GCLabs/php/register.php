<?php

@include 'config.php';

if(isset($_POST['save'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_details WHERE email = '$email' && password = '$pass' ";
   $sct = " SELECT * FROM user_details WHERE name = '$name' && password = '$pass' ";
   $res = mysqli_query($conn, $sct);
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0 || mysqli_num_rows($res) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_details(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};
include 'register.html';
?>