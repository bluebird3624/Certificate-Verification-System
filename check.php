<?php
include "includes/functions.php";
function hyphenStringToArray($string) {
    $words = explode('-', $string);
    return $words;
}  

// $hash = $_GET["hash"];
$hash ="MO2Rj7zL4NgruFD+z9D3nVRUeFM3RnFLNkErNHBYVHEwd21GWkU2R1F3bWZrTWVTY0Z3QUg5dlNZOUIwTWdsMlpBTHc0QnBoN091THpLUCs1SU43VEFWb1dkT0RIbVAzNVFUNit5Si8xYmVHNEF3cnZPUlFuekZJQWhSV09ST2pYaFhzaGVaOTU1SGR5OHV0NkhhYUYzMm1uczFyVkM0QlNSND0=";

$decryptedString = decrypting($hash);

$json = json_encode(hyphenStringToArray($decryptedString));

echo $json;


