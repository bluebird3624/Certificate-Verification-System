<?php
require "includes/connect.php";


	$result = mysqli_query($conn,"SELECT * FROM school_info limit 1");
	$num = mysqli_num_rows ( $result );

	if($num >0)
	{
		$row = mysqli_fetch_assoc($result);
		$id = $row['id'];
		$instname = $row['institution_name'];
		$acronym = $row['acronym'];
		$category = $row['category'];
		$type = $row['type'];
		$salt = $row['salt'];
		$ykey = $row['yearly_key'];
		$year = $row['year'];
		$agentskey = $row['agents_key'];
	}

?>

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
    <input type="text" id="name1" name='institutionName' value = "<?php if(isset($instname)){echo $instname;} ?>" required>
	</li>
	
	<li>
		<label for="name2">Acronym</label>
    <input type="text" id="name2" name='acronym'  value = "<?php if(isset($acronym)){echo $acronym;} ?>" required>
	</li>
	
	<li>
		<label for="email"> Category </label>
    <input type="text" id="email" name='category'  value = "<?php if(isset($category)){echo $category;} ?>" required>
	</li>

	<li>
		<label for="name2">Type</label>
    <input type="text" id="name2" name='type'  value = "<?php if(isset($type)){echo $type;} ?>" required>
	</li>
	
	<li>
		<label for="phone">Salt</label>
    <input type="text" name="salt" id="phone"  value = "<?php if(isset($salt)){echo $salt;} ?>" required>
	</li>
	
	<li col-1>
		<label for="address">Yearly Key</label>
    <input type="text" id="address" name='yearlykey'  value = "<?php if(isset($ykey)){echo $ykey;} ?>" required>
	</li>
	
	<li>
		<label for="city">Year</label>
    <input type="text" id="city" name='year'  value = "<?php if(isset($year)){echo $year;} ?>" required>
	</li>
	
	<li>
		<label for="country">Agents Key</label>
    <input type="text" id="country" name='agentskey'  value = "<?php if(isset($agentskey)){echo $agentskey;} ?>" required>
	</li>
	
	
	
	<!-- <li>
		<label toggle>
			<input type="checkbox">
			<span>Forward me a copy</span>
		</label>
	</li> -->
	
	<li>
		<button name='submit'>
		<?php if(isset($agentskey))
		{echo 'Edit';}
		else{echo 'Submit';} 
		?></button>
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