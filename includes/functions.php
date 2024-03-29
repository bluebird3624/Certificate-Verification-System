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

// function encrypting($variable)
// {
//     $ciphering = "AES-128-CTR";
//     $iv_lenth = openssl_cipher_iv_length($ciphering);
//     $options = 0;
//     $encryption_vi = "1234567891011121";
//     $encryption_key = "ElgonviewCollage";

//     return $encryption = openssl_encrypt($variable,$ciphering,$encryption_key,$options,$encryption_vi);
// }

function encrypting($variable)
{
    // Compress the data using gzip
    $encryption_key = "ElgonviewCollage";
    $compressed_data = gzcompress($variable);

    // Encrypt the compressed data using AES-128-CTR
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = openssl_random_pseudo_bytes($iv_length);

    $encrypted_data = openssl_encrypt($compressed_data, $ciphering, $encryption_key, $options, $encryption_iv);

    // Concatenate the encryption IV and the encrypted data
    $output = $encryption_iv . $encrypted_data;

    // Base64 encode the output to make it shorter
    $output = base64_encode($output);

    return $output;
}


// function decrypting($variable)
// {
//     $ciphering = "AES-128-CTR";
//     $iv_lenth = openssl_cipher_iv_length($ciphering);
//     $options = 0;
//     $decryption_vi = "1234567891011121";
//     $decryption_key = "ElgonviewCollage";

//     return $decryption = openssl_decrypt($variable,$ciphering,$decryption_key,$options,$decryption_vi);
// }

function decrypting($encrypted)
{
    // Base64 decode the input
    $encryption_key = "ElgonviewCollage";
    $input = base64_decode($encrypted);
    // Extract the encryption IV and the encrypted data
    $iv_length = openssl_cipher_iv_length("AES-128-CTR");
    $encryption_iv = substr($input, 0, $iv_length);
    $encrypted_data = substr($input, $iv_length);

    // Decrypt the encrypted data using AES-128-CTR
    $ciphering = "AES-128-CTR";
    $options = 0;

    $decrypted_data = openssl_decrypt($encrypted_data, $ciphering, $encryption_key, $options, $encryption_iv);

    // Decompress the decrypted data using gzip
    $decompressed_data = gzuncompress($decrypted_data);

    return $decompressed_data;
}



function check_system_time() {
    $time_difference = time() - strtotime(date("Y-m-d H:i:s"));
    if ($time_difference > 0) {
        return "System time is ahead by $time_difference seconds";
    } elseif ($time_difference < 0) {
        return "System time is behind by " . abs($time_difference) . " seconds";
    } else {
        return "System time is correct";
    }
}


// Function to check student eligibility
function check_student_eligibility($conn)
{
    $sql = "SELECT student_id, GPA, fee_balance FROM student_info WHERE fee_balance > 0 AND GPA > 3";
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $student_ids[] = $row["student_id"];
      }
      return $student_ids;
    } else {
      return "No eligible students found.";
    }
    $conn->close();
}

function hashconst($data)
{
    // $data = $institutionName . $acronym . $category . $type . $yearlyKey . $agentsKey . $year . $studentId . $studentName . $course . $gpa;
    // $data = $salt . $data;
    $hash = hash('sha256', $data);
    return $hash;
}

function hashkey($salt, $institutionName, $acronym, $category, $type, $yearlyKey, $agentsKey, $year, $studentId, $studentName, $course, $gpa)
{
    $separator = "-";//add between variables
    $data = $institutionName . $acronym . $category . $type . $yearlyKey . $agentsKey . $year . $studentId . $studentName . $course . $gpa;
    $data = $salt . $data;
    $hash = password_hash($data, PASSWORD_BCRYPT);
    return $hash;
}

function verifyHash($data, $hash)
{
    if (password_verify($data, $hash)) {
        return true;
    } else {
        return false;
    }
}

function getCurrentYearNairobi() {
    date_default_timezone_set('Africa/Nairobi'); // Set timezone to Nairobi
    return date('Y'); // Get the current year
}



// function generateCertificate($student_id, $string, $conn) {
    
//     // Retrieve user info based on student_id
//     // echo $student_id."</br>";
//     $sql = "SELECT name, GPA, course FROM student_info WHERE student_id = '$student_id'";
//     $result = mysqli_query($conn, $sql);

//     if (!$result) {
//         die("Error executing query: " . mysqli_error($conn));
//     }
    
//     // Check if user exists
//     if (mysqli_num_rows($result) == 0) {
//         echo "User not found";
//         return;
//     }
    
//     // Fetch user info
//     $row = mysqli_fetch_assoc($result);
//     $name = $row["name"];
//     $gpa = $row["GPA"];
//     $course = $row["course"];
//     $year = date("Y");

//     $string = $string.$student_id.$name.$course.$gpa.$year;
    
//     // Generate hash
//     $hash = hashconst($string);
    
//     // Get current year
    
    
//     // Insert data into certificates table
//     $sql = "INSERT INTO certificates (name, gpa, course, hash, year, studentid) VALUES ('$name', '$gpa', '$course', '$hash', '$year', '$student_id')";
//     if (mysqli_query($conn, $sql)) {
//         // include "./solidity.php";
//         // include_once "./solidity.php";
//         echo "
//             <script>
//                 var id = $student_id;
//                 var hash = $student_id;
//                 uploadName(id,hash);
//             </script>
//         ";
//     } else {
//         echo "Error generating certificate: " . mysqli_error($conn);
//     }
    
//     // Close database connection
// }

// require "connect.php";
// generateCertificate("1025", "testtest", $conn);

// $salt = "random_salt_value";
// $institutionName = "University of Technology";
// $acronym = "UT";
// $category = "public";
// $type = "university";
// $yearlyKey = "2020-2021";
// $agentsKey = "agent123";
// $year = 2021;
// $studentId = 1234567;
// $studentName = "John Doe";
// $course = "Computer Science";
// $gpa = 3.5;

// $hash = hashconst($salt, $institutionName, $acronym, $category, $type, $yearlyKey, $agentsKey, $year, $studentId, $studentName, $course, $gpa);
// echo $hash;
// echo "</br>";

// $salt = "random_salt_value";
// $institutionName = "University of Technology";
// $acronym = "UT";
// $category = "public";
// $type = "university";
// $yearlyKey = "2020-2021";
// $agentsKey = "agent123";
// $year = 2021;
// $studentId = 1234567;
// $studentName = "John Doe";
// $course = "Computer Science";
// $gpa = 3.5;

// $data = $salt . $institutionName . $acronym . $category . $type . $yearlyKey . $agentsKey . $year . $studentId . $studentName . $course . $gpa;
// echo $hash2 = hashconst($salt, $institutionName, $acronym, $category, $type, $yearlyKey, $agentsKey, $year, $studentId, $studentName, $course, $gpa);

// if ($hash === $hash2) {
//     echo "The data matches the hash";
// } else {
//     echo "The data does not match the hash";
// }

// function test()
// {
//     echo "<script>
//         console.log('hello');
//     </script>";
// }