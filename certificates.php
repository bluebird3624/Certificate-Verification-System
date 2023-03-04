<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/certificates.css">
    <script src="javascript/jquery.js"></script>
    <script src="javascript/certificates.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificates</title>
</head>
<body>
<?php require "navbar.php";?>
<?php
		session_start();
		if($_SESSION['logged_in'])
		{
			
	?>
<!-- THE HTML SEARCH UI -->
<div id="searchtools">
  <h2>Search</h2>
  <table width="100%" border="0" align="center">
    <tr><td style="width: 24%;" align="right">Name: </td><td style="width: 76%;"><input type="text" id="search-val-name" class="input-textbox" placeholder="All"></td></tr>
    
      <tr><td align="right">Student ID: </td><td><input type="text" id="search-val-city" class="input-textbox" placeholder="All"></td></tr>
      <tr style="display:none;"><td>Has Phone Num?</td><td style="padding-left: 20px;">
      Yes: <input type="radio" value="true" name="searchvalhasphone" class="inputradio"  checked> &nbsp; &nbsp;
      No: <input type="radio" value="false" name="searchvalhasphone" class="inputradio">
      </td></tr>
    
  </table>
</div>

<?php 
	require "includes/connect.php";
	$result = $conn->prepare("SELECT * FROM certificates ORDER BY id DESC");
	$result->execute();
	// echo $rowcount = rowcount($result);
?>
<!-- THE HTML TABLE DATA -->
<table cellpadding="0" cellspacing="0" id="resultTable">
  <tr>
    <!-- <th>name</th>
    <th>city</th>
    <th>phone</th> -->
    <th>Name</th>
    <th>Student ID</th>
    <th>Course</th>
    <th>Hash</th>
    <th>G.P.A</th>
    <th>Year</th>
</tr>
<?php
	include('includes/connect.php');
	$result = mysqli_query($conn,"SELECT * FROM certificates ORDER BY id DESC");
	for($i=0; $row = mysqli_fetch_assoc($result); $i++){
?>
	<tr>
        <td><?php echo $row['name']; ?></td>
		<td><?php echo $row['studentid']; ?></td>
		<td><?php echo $row['course']; ?></td>
		<td><?php echo $row['hash']; ?></td>
		<td><?php echo $row['gpa']; ?></td>
		<td><?php echo $row['year']; ?></td>
	</tr>
<?php
	}
?>
  
</table>

<?php
    }
    ?>
</body>
</html>