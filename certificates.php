<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/certificates.css">
    <script src="javascript/certificates.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Certificates</title>
</head>
<body>
<?php require "navbar.php";?>
<div style="margin-top: -19px; margin-bottom: 21px;">

<?php 
	require "includes/connect.php";
	$result = $conn->prepare("SELECT * FROM certificates ORDER BY id DESC");
	$result->execute();
	// echo $rowcount = rowcount($result);
?>
			<div style="text-align:center;">
			Total Number of Employees: <font color="green" style="font:bold 22px 'Aleo';"><?php echo "rowcount";?></font>
			</div>
</div>

<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search Customer..." autocomplete="off" />
<!-- <a rel="facebox" href="addcustomer.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Employee</button></a><br><br> -->

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%"> Student ID </th>
			<th width="10%"> Name </th>
			<th width="10%"> Course</th>
			<th width="23%"> Hash</th>
			<th width="9%"> G.P.A</th>
			<th width="17%"> Year </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('includes/connect.php');
				$result = mysqli_query($conn,"SELECT * FROM certificates ORDER BY id DESC");
				for($i=0; $row = mysqli_fetch_assoc($result); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['studentid']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['course']; ?></td>
			<td><?php echo $row['hash']; ?></td>
			<td><?php echo $row['gpa']; ?></td>
			<td><?php echo $row['year']; ?></td>

			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
<script src="javascript/jquery.js"></script>

</body>
</html>