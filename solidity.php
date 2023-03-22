<?php echo "

<!-- Include web3.js library -->
<script src='./javascript/web3.min.js'></script>

<!-- Create a web3 instance -->
<script>
  const web3 = new Web3('http://localhost:7545');

  // check that the web3 connection is working
  web3.eth.getBlockNumber()
    .then(blockNumber => console.log('Latest block number: ' + blockNumber))
    .catch(err => console.error(err));

    //setDefaults 
    web3.eth.sendTransaction({
        from: '0x683A7ef7EECe97EE110fB738465FfBa1039c63a8'
    })


    // Set the address of the contract and its ABI

  const contractAddress = '0x3fD8aF995A8722Bb2b50df06D56Ee8aDB9D5134A';

  const contractABI =[
	{
		'inputs': [
			{
				'internalType': 'uint256',
				'name': '_studentId',
				'type': 'uint256'
			},
			{
				'internalType': 'string',
				'name': '_verificationHash',
				'type': 'string'
			}
		],
		'name': 'addStudent',
		'outputs': [],
		'stateMutability': 'nonpayable',
		'type': 'function'
	},
	{
		'inputs': [
			{
				'internalType': 'string',
				'name': '_verificationHash',
				'type': 'string'
			}
		],
		'name': 'getStudent',
		'outputs': [
			{
				'internalType': 'uint256',
				'name': '',
				'type': 'uint256'
			}
		],
		'stateMutability': 'view',
		'type': 'function'
	},
	{
		'inputs': [
			{
				'internalType': 'string',
				'name': '',
				'type': 'string'
			}
		],
		'name': 'hashToStudent',
		'outputs': [
			{
				'internalType': 'uint256',
				'name': '',
				'type': 'uint256'
			}
		],
		'stateMutability': 'view',
		'type': 'function'
	}
];

  // Create an instance of the contract
  const contract = new web3.eth.Contract(contractABI, contractAddress);
  // Call a function on the contract to get the value
  function getName(){
    contract.methods.getStudent().call()
      .then(value =>document.getElementById('message').textContent = value)
      .then(value => console.log('Value: '+ value))
      .catch(err => console.error(err));

    document.getElementById('message').textContent = value;
  }

    function uploadName(studentid,studenthash) {
        const dataInput1 = studentid;
        const dataInput2 = studenthash;

        contract.methods.addStudent(dataInput1,dataInput2).send({ from: '0x683A7ef7EECe97EE110fB738465FfBa1039c63a8' })
        .then((receipt) => {
        console.log('Transaction receipt:', receipt);
        })
        .catch((error) => {
        console.error('Transaction error:', error);
        });
    }


</script>

";

