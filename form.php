<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/navbarr.css">
    <title>Document</title>
</head>
<body>
    <!--This should be wrapped inside a <form> tag-->

	<?php require "navbar.php";?>

	<?php
		session_start();
		if($_SESSION['logged_in'])
		{
			
	?>
<form action="schooldata.php" method="post">
<ul role="list">
	
	<li>
		<label for="name1">Institution name</label>
    <input type="text" id="name1" name='institutionName' required>
	</li>
	
	<li>
		<label for="name2">Acronym</label>
    <input type="text" id="name2" name='acronym' required>
	</li>
	
	<li>
		<label for="email"> Category </label>
    <input type="text" id="email" name='category' required>
	</li>

	<li>
		<label for="name2">Type</label>
    <input type="text" id="name2" name='type' required>
	</li>
	
	<li>
		<label for="phone">Salt</label>
    <input type="text" name="salt" id="phone" required>
	</li>
	
	<li col-1>
		<label for="address">Yearly Key</label>
    <input type="text" id="address" name='yearlykey' required>
	</li>
	
	<li>
		<label for="city">Year</label>
    <input type="text" id="city" name='year' required>
	</li>
	
	<li>
		<label for="country">Agents Key</label>
    <input type="text" id="country" name='agentskey' required>
	</li>
	
	
	
	<!-- <li>
		<label toggle>
			<input type="checkbox">
			<span>Forward me a copy</span>
		</label>
	</li> -->
	
	<li>
		<button name='submit'>Submit</button>
	</li>
	
</ul>
</form>
<?php
		}
	else
	{
		header("location:index.html");
	}
?>
</body>
</html>