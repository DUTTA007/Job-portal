<?php
include 'dbconn.php';
//session_start();
$query = " SELECT * FROM job ";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
	while ($row = mysqli_fetch_array($result)) {
		?>

		<tr> 
			<td> <?php echo $row['JID']; ?></td>
			<td> <?php echo $row['Name']; ?></td>
			<td> <?php echo $row['Description']; ?></td>
			<td> <?php echo $row['TenCutOff']; ?></td>
			<td> <?php echo $row['TwelveCutOff']; ?></td>
			<td> <?php echo $row['EnggCutOff']; ?></td>
			<?php
			$id = $row['JID']; 
			$res = mysqli_query($conn,"select JD from job where JID=$id");
    while ($row1 = mysqli_fetch_array($res)) {
        $file = 'uploads/pdf/'.$row1['JD'];   
        //echo $file; 
    ?>
			<td class="text-center"><a href="<?php echo $file ?>" class = btn btn-primary">Download JD</a></td>

<?php }?>


		</tr>

	
<?php	}
}
?>
<
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>
<body>

</body>
</html>