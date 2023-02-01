<?php
require "includes/functions.php";
require "includes/connect.php";

if(isset($_POST['password']))
{
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['re-enterpassword'];

    if($password == $repassword)
    {
        $username = encrypting($username);
        $firstname = encrypting($firstname);
        $lastname = encrypting($lastname);
        $email = encrypting($email);
        $password = hash_password($password);
        // echo $password = hash_password($password);
        $stmt =$conn -> prepare("INSERT INTO users (username, email, password, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
        $stmt -> bind_param("sssss", $username, $email, $password, $firstname, $lastname);

        
        if (mysqli_stmt_execute($stmt)) {
            header("location:index.html?msg=New user added successfully");
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    }
    
}
else
{
    header("location: index.html");
}