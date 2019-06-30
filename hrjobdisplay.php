<?php
include 'dbconn.php';
session_start();
?>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
<div>
	<br><br>
	<button id="displaydata" class="btn btn-danger"> Show Jobs </button>

	<table class="table table-striped table-bodered text-center">
	<thead>
		<th>Job ID</th>
		<th>Job Title</th>
		<th>Company name</th>
		<th>Number of Students applied</th>
		
<!-- 		<th><a href = "Students application">Complete details</a> </th>
 -->		<!-- <th>Engineering Cut off</th> -->
	</thead>
	<tbody id="response">
		
	</tbody>
	
</table>
</div>
<script type="text/javascript">
	 $('#displaydata').click(function(){
		// displaydata();
		// function displaydata(){
		$.ajax({
			url:'joblist.php',
			type: 'post',
			success:function(responsedata){
				$('#response').html(responsedata);
			}
		})
	 })
//}
	
</script>
<label>Job ID:</label>
    <?php
        $get = mysqli_query($conn, "SELECT JID FROM job");
        $option = '';
        while($row = mysqli_fetch_assoc($get))
        {
        $option .= '<option value = "'.$row['JID'].'">'.$row['JID'].'</option>';
        }
    ?>

    <form action="individual.php" method="POST" id="search">
        <select name="jobid"> 
            <?php echo $option; ?>
        </select>
        <br>
        <input type="submit" name="SubmitButton"/>
    </form>
    <h2><a href="JobPost.php"> Post Jobs</a>
    <h2><a href="JobDelete.php"> Delete Jobs</a>
    <h2><a href = "logout.php">Sign Out</a></h2>
<!-- button onclick="location.href='individual.php'"> Click to see individual details</button> -->
</body>
</html>