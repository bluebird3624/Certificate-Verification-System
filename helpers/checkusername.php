<?php
require "../includes/connect.php";
require "../includes/functions.php";

if(isset($_GET['username']))
{

    $username = $_GET['username'];
    $username = encrypting($username);

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");

    // Bind the input parameter
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Store the result
    $result = $stmt->get_result();

    // Check if the email address already exists
    if ($result->num_rows > 0) {
        // Email address already exists
        $array = array("message" => "true");
        $array1 = json_encode($array);
        echo $array1;
    } else {
        $array = array("message" => "false");
        $array1 = json_encode($array);
        echo $array1;
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
}
