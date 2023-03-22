<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/certificates.css">
    <script src="javascript/jquery.js"></script>
    <script src="javascript/certificates.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/generatebtn-Styling.css">
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
    <th>G.P.A</th>
    <th>Fee Balance</th>
</tr>
<?php
	include('includes/connect.php');
	$result = mysqli_query($conn,"SELECT * FROM student_info WHERE fee_balance > 0 AND GPA > 2");
	for($i=0; $row = mysqli_fetch_assoc($result); $i++){
?>
	<tr>
    <td><?php echo $row['name']; ?></td>
		<td><?php echo $row['student_id']; ?></td>
		<td><?php echo $row['course']; ?></td>
		<td><?php echo $row['GPA']; ?></td>
		<td><?php echo $row['fee_balance']; ?></td>
	</tr>
<?php
	}
?>
  
</table>
<div class="button_wrapper">
	<div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
		</svg></div>
</div>

<span class="reset hidden" style="display:hidden;">Reset</span>
<?php
        
    }
    ?>
</body>
<script src="javascript/buttoneffects.js"></script>
</html>