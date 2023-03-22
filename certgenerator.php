<?php

require "includes/functions.php";
require "includes/schooldata.php";
require "includes/connect.php";

$qualified = check_student_eligibility($conn);

foreach($qualified as $id)
{
    generateCertificate($id, $string, $conn);
}

$message = json_encode(array('state' => 'done'));
echo $message;
    
?>