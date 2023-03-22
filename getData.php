<!DOCTYPE html>
<html>
<head>
	<title>Search Page</title>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/search.css">
    <script src="https://kit.fontawesome.com/43dcc20e7a.js" crossorigin="anonymous"></script>
    <script src='javascript/web3.min.js'></script>
	
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
  // var result;
  

  function getName(){
    var result;
    const dataInput = document.getElementById('dataInput').value;
    console.log(dataInput);
    contract.methods.getStudent(dataInput).call()
      .then(value => {
        result = value;
        console.log(`Value: ${value}`);
        if(result != 0)
        {
          var xhr = new XMLHttpRequest();

          xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
             console.log(xhr.responseText);
            } else {
            console.error('Error: ' + xhr.status);
          }
        }
        };

        xhr.open('GET', 'check.php?hash='+dataInput, true);
        xhr.send();
      }
      })
      .then(value =>document.getElementById('message').textContent = value)
      // .then(value => console.log(`Value: ${value}`))
      .catch(err => console.error(err));
      value = document.getElementById('message').value;
      console.log(result);
      
    };

  console.log(result);

  function showTable() {
		document.getElementById("resultsTable").style.display = "block";
	}
   function hideTable() {
		document.getElementById("resultsTable").style.display = "none";
	}
   function getData() {
		document.getElementByClass("search-input").style.display = "none";
	}
</script>


</head>
<body>
  <?php include "navbarPublic.php"?>
	<!-- <input type="text" placeholder="Search..."> -->
  <div class="container">
    <div class="search-box">
       <input type="text" class="search-input" id="dataInput" placeholder="Search..">
       <p style="" id="message"></p>
       <button class="search-button" onclick="getName()">
         <i class="fas fa-search"></i>
       </button>
    </div>
 </div>
	<!-- <button onclick="showTable()">Search</button> -->
	<div id="resultsTable">
    <div style="position: absolute;top: 0;right: 0;padding-right:2em;padding-top:1em;cursor:pointer;" onclick="hideTable()">X</div>
    
		<table class="table-fill">
            <thead>
            <tr>
            <th class="text-left">Month</th>
            <th class="text-left">Sales</th>
            </tr>
            </thead>
            <tbody class="table-hover">
            <tr>
            <td class="text-left">January</td>
            <td class="text-left">$ 50,000.00</td>
            </tr>
            <tr>
            <td class="text-left">February</td>
            <td class="text-left">$ 10,000.00</td>
            </tr>
            <tr>
            <td class="text-left">March</td>
            <td class="text-left">$ 85,000.00</td>
            </tr>
            <tr>
            <td class="text-left">April</td>
            <td class="text-left">$ 56,000.00</td>
            </tr>
            <tr>
            <td class="text-left">May</td>
            <td class="text-left">$ 98,000.00</td>
            </tr>
            </tbody>
            </table>
	</div style="padding-bottom:2em;">
</body>
</html>
