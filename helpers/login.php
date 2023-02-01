<?php
require "../includes/functions.php";
if(isset($_POST['username']))
{
    session_start();
   $username = encrypting($_POST['username']);
   $password =$_POST['password'];

   $state = login($username, $password);

   if($state)
   {
     header("location:../form.php");
   }
   else
   {
        header("location:../index.html?msg=wrong password or user name");
   }
}
else
{
    header("location:../index.html");
}