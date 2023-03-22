<?php
require "includes/functions.php";
require "includes/connect.php";

if(isset($_POST['submit']))
{
    $InstitutionsName = $_POST['institutionName'];
    $Acronym = $_POST['acronym'];
    $Category = $_POST['category'];
    $type = $_POST['type'];
    
    $salt = $_POST['salt'];
    $yearlyKey = $_POST['yearlykey'];
    $agentsKey = $_POST['agentskey'];
    $year = getCurrentYearNairobi();
    
    $stmt =$conn -> prepare("INSERT INTO school_info (institution_name, acronym, category, type, salt, yearly_key, year,agents_key) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt -> bind_param("ssssssss", $InstitutionsName, $Acronym, $Category, $type, $salt, $yearlyKey, $year, $agentsKey);

    if (mysqli_stmt_execute($stmt)) {
        header("location:form.php?msg=New user added successfully");
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);

}

?>