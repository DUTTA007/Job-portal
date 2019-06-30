<?php
include 'dbconn.php';
session_start();
$query = " SELECT * FROM job";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
	while ($row = mysqli_fetch_array($result)) {
		$rid = $row['JID'];
		//echo "$rid";
		$query2 = "SELECT JID, COUNT(SID) FROM `jobapplied` where JID=$rid GROUP BY JID";
		$res2 = mysqli_query($conn,$query2);
		?>

		<tr> 
			<td> <?php echo $row['JID']; ?></td>
			<td> <?php echo $row['Name']; ?></td>
			<td> <?php echo $row['Description']; ?> </td>
			<td> <?php 
			while ($row1 = mysqli_fetch_array($res2)) {
			//$rid = $row['JID'];
			echo $row1['COUNT(SID)']?></td>			
			<!-- <td><a href="download.php" class="btn btn-primary">Job Description</a> </td> -->
			<!-- <td> <?php //echo $row['TwelveCutOff']; ?></td>
			<td> <?php //echo $row['EnggCutOff']; ?></td> --> 
			<!-- <td> <?php //echo $row['JD']; ?></td> -->




		</tr>

	
<?php	}
}
}	
?>