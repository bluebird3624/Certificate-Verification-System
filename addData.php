<?php include 'includes/functions.php';?>
<?php include 'includes/connect.php';?>
<?php
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
    $separetor = "-";
    
    $string = $salt.$separetor.$institution_name.$separetor.$acronym.$separetor.$category.$separetor.$type.$separetor.$yearly_key.$separetor.$agents_key.$separetor.$year;
?>
<!-- Include web3.js library hello1 -->
<script src='javascript/web3.min.js'></script>

<!-- Create a web3 instance -->
<script>
  const web3 = new Web3('http://localhost:7545');
  const walet = '0x3b9Cd456E70197ad4CE41a9eAE6f3939a350CdaD';
  const contrA = '0x5578c8c8E872BE5117781EA34435b2c57780435F';
  
  // check that the web3 connection is working
  web3.eth.getBlockNumber()
    .then(blockNumber => console.log(`Latest block number: ${blockNumber}`))
    .catch(err => console.error(err));

    //setDefaults 
    web3.eth.sendTransaction({
        from: walet
    })


    // Set the address of the contract and its ABI

  const contractAddress = contrA;

  const contractABI =[
			{
				"inputs": [
					{
						"internalType": "uint256",
						"name": "_studentId",
						"type": "uint256"
					},
					{
						"internalType": "string",
						"name": "_verificationHash",
						"type": "string"
					}
				],
				"name": "addStudent",
				"outputs": [],
				"stateMutability": "nonpayable",
				"type": "function"
			},
			{
				"inputs": [
					{
						"internalType": "string",
						"name": "_verificationHash",
						"type": "string"
					}
				],
				"name": "getStudent",
				"outputs": [
					{
						"internalType": "uint256",
						"name": "",
						"type": "uint256"
					}
				],
				"stateMutability": "view",
				"type": "function"
			},
			{
				"inputs": [
					{
						"internalType": "string",
						"name": "",
						"type": "string"
					}
				],
				"name": "hashToStudent",
				"outputs": [
					{
						"internalType": "uint256",
						"name": "",
						"type": "uint256"
					}
				],
				"stateMutability": "view",
				"type": "function"
			}
		];

  // Create an instance of the contract
  const contract = new web3.eth.Contract(contractABI, contractAddress);
  // Call a function on the contract to get the value
  

    function uploadName(studentid,studenthash)
    {
        const dataInput1 = studentid;
        const dataInput2 = studenthash;

        contract.methods.addStudent(dataInput1,dataInput2).send({ from: walet })
        .then((receipt) => {
        console.log('Transaction receipt:', receipt);
        })
        .catch((error) => {
        console.error('Transaction error:', error);
        });
    }
</script>

    <?php
        $qualified = check_student_eligibility($conn);

        foreach($qualified as $student_id)
        {
            echo $student_id."</br>";
            // Retrieve user info based on student_id
            // echo $student_id."</br>";
            $sql = "SELECT name, GPA, course FROM student_info WHERE student_id = '$student_id'";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Error executing query: " . mysqli_error($conn));
            }// Check if user exists
            else if (mysqli_num_rows($result) == 0) {
                echo "User not found";
                return;
            }else{

            // Fetch user info
            $row = mysqli_fetch_assoc($result);
            $name = $row["name"];
            $gpa = $row["GPA"];
            $course = $row["course"];
            $year = date("Y");
            $separetor = "-";
        
            $string1 = $string.$separetor.$student_id.$separetor.$name.$separetor.$course.$separetor.$gpa.$separetor.$year;

            // Generate hash
            $hash = encrypting($string1);
            echo "
           
            <script style='display:none;' id='upload-script'>
                var student_id = ".$student_id.";
                var hash = '".$hash."';
                uploadName(student_id, hash);
                var script = document.getElementById('upload-script');
                script.parentNode.removeChild(script);
            </script>
            ";
            $sql = "INSERT INTO certificates (name, gpa, course, hash, year, studentid) VALUES ('$name', '$gpa', '$course', '$hash', '$year', '$student_id')";
            mysqli_query($conn, $sql);
           
            }
        }

        $message = json_encode(array('state' => 'done'));
        echo $message;
    ?>
</body>
</html>