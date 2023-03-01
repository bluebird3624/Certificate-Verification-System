<?php
require "connect.php";
// Retrieve data from school_info table
$sql = "SELECT institution_name, acronym, category, type, salt, yearly_key, year, agents_key FROM school_info";
$result = mysqli_query($conn, $sql);

// Check if any data was found
if (mysqli_num_rows($result) == 0) {
    echo "No data found in school_info table";
    return;
}

// Fetch data and save to variables
$row = mysqli_fetch_assoc($result);
$institution_name = $row["institution_name"];
$acronym = $row["acronym"];
$category = $row["category"];
$type = $row["type"];
$salt = $row["salt"];
$yearly_key = $row["yearly_key"];
$year = $row["year"];
$agents_key = $row["agents_key"];

$string = $salt.$institution_name.$acronym.$category.$type.$yearly_key.$agents_key.$year;

// Close database connection
mysqli_close($conn);

?>