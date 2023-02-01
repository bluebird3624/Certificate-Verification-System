<?php

// log in validatio
function login($username, $password) {

    require "../includes/connect.php";
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");

    // Bind the input parameters
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Store the result
    $result = $stmt->get_result();

    // Fetch the hashed password from the result
    $data = $result->fetch_assoc();
    if(!isset($data['password']))
    {
        header("location:../index.html?msg=user not found");
    }
    else{
        $hashed_password = $data['password'];
        // echo "</br>";
        // echo $password;

        // Verify the password
        if (password_verify($password, $hashed_password)) {
        // Log the user in
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $username;
            return true;
        } else {
            // Return false if the password is incorrect
            // header("location:../index.html?msg=wrong password or username");
            return false;
        }
    }
    
    

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
}

// Hash a new password for storing in the database.
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

function encrypting($variable)
{
    $ciphering = "AES-128-CTR";
    $iv_lenth = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_vi = "1234567891011121";
    $encryption_key = "ElgonviewCollage";

    return $encryption = openssl_encrypt($variable,$ciphering,$encryption_key,$options,$encryption_vi);
}

function decrypting($variable)
{
    $ciphering = "AES-128-CTR";
    $iv_lenth = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $decryption_vi = "1234567891011121";
    $decryption_key = "ElgonviewCollage";

    return $decryption = openssl_decrypt($variable,$ciphering,$decryption_key,$options,$decryption_vi);
}