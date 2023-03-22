<?php
// Database connection settings
$host = "localhost";
$user = "root";
$password = "roy";
$database = "ecvs";

function generateRandomValue() {
    return rand(0, 10000);
}


// Connect to MySQL database
$conn = mysqli_connect($host, $user, $password, $database);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select data from certificates table
// $sql = "SELECT name, gpa, course, studentid FROM certificates";
$sql = "SELECT name, gpa, course, studentid FROM certificates WHERE id >= 224 AND id <= 241";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Insert data into student_info table
while ($row = mysqli_fetch_assoc($result)) {
    $name = $row["name"];
    $gpa = $row["gpa"];
    $course = $row["course"];
    $studentid = $row["studentid"];
    $fee = generateRandomValue();

    $insertSql = "INSERT INTO student_info (student_id,name, GPA,fee_balance,course) VALUES ('$studentid','$name', '$gpa','$fee' , '$course')";
    $insertResult = mysqli_query($conn, $insertSql);

    if (!$insertResult) {
        die("Insert failed: " . mysqli_error($conn));
    }
}

// Close database connection
mysqli_close($conn);
?>
