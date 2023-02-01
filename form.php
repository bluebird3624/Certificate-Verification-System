<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Document</title>
</head>
<body>
    <!--This should be wrapped inside a <form> tag-->

	<?php
		session_start();
		if($_SESSION['logged_in'])
		{
			
	?>

<ul role="list">
	
	<li>
		<label for="name1">Institution name</label>
    <input type="text" id="name1" name='institutionName'>
	</li>
	
	<li>
		<label for="name2">Acronym</label>
    <input type="text" id="name2" name='acronym'>
	</li>
	
	<li>
		<label for="email"> Category </label>
    <input type="email" id="email" name='category'>
	</li>

	<li>
		<label for="name2">Type</label>
    <input type="text" id="name2" name='type'>
	</li>
	
	<li>
		<label for="phone">Salt</label>
    <input type="text" name="salt" id="phone">
	</li>
	
	<li col-1>
		<label for="address">Yearly Key</label>
    <input type="text" id="address" name='yearlykey'>
	</li>
	
	<li>
		<label for="city">Year</label>
    <input type="text" id="city" name='year'>
	</li>
	
	<li>
		<label for="country">Agents Key</label>
    <input type="text" id="country" name='agentskey'>
	</li>
	
	
	
	<!-- <li>
		<label toggle>
			<input type="checkbox">
			<span>Forward me a copy</span>
		</label>
	</li> -->
	
	<li>
		<button>Submit</button>
	</li>
	
</ul>
<?php
		}
	else
	{
		header("location:index.html");
	}
?>
</body>
</html>