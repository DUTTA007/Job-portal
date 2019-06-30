 <html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	
</head>
<body>	
	<div>
	<br><br>
	
<?php
include 'dbconn.php';
session_start();
$jid = $_POST['jobid'];
//echo $jid;
$query = " SELECT student.*, jobapplied.SID FROM student,jobapplied where jobapplied.JID =$jid AND student.SID = jobapplied.SID";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
	while ($row = mysqli_fetch_array($result)) {
		?>
		<table class="table table-striped table-bodered text-center">
	<thead>
		<th>Name</th>
		<th>USN</th>
		<th>Department</th>
		<th>Email ID</th>
	</thead>
	<tbody>
		<tr> 
			<td> <?php echo $row['Name']; ?></td>
			<td> <?php echo $row['USN']; ?></td>
			<td> <?php echo $row['Dept']; ?> </td>
			<td> <?php echo $row['Email']; ?> </td>
		</tr>
		</tbody>
		</table>
</div>
<?php	}

}	
?>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>
	
