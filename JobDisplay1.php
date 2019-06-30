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
	<!-- <button id="displaydata" class="btn btn-danger"> Show Jobs </button>
 -->
	<table class="table table-striped table-bodered text-center">
	<thead>
		<th>Job ID</th>
		<th>Job Title</th>
		<th>Description</th>
		<th>Tenth Cut off</th>
		<th>Twelve Cut Off </th>
		<th>Engineering Cut off</th>
		<th> Job Description</th>
	</thead>
	<tbody id="response">
		
	</tbody>
	
</table>
</div>
<script type="text/javascript">
	// $('#displaydata').click(function(){
		displaydata();
		function displaydata(){
		$.ajax({
			url:'displayajax.php',
			type: 'post',
			success:function(responsedata){
				$('#response').html(responsedata);
			}
		})
	// }
}
	
</script>
<button onclick="location.href='jobapply.php'"> Apply Job</button>

</body>
</html>