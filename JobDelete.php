<?php 
include 'dbconn.php';
session_start();
if(isset($_POST['SubmitButton'])){
$id = $_POST['jobid'];
echo $id;
$query = "DELETE FROM job WHERE job.JID = $id";
mysqli_query($conn,$query);
}
?>
<html>
<head>
	<style type="text/css">
		
  .bg{
    background-color: #d3ead8;
  }
  .iv{
 color: maroon;
 size:8px;
  }
  .e2{
  width: 300px;
  border: 25px solid maroon;
  padding: 25px;
  margin: 25px;
}
 input[type=submit]{
    background-color: maroon; /* Green */
    border border-radius:50%;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    }
    input[type=button]{
    background-color: maroon; /* Green */
    border border-radius:50%;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-top: -15%;
    margin-left: 90%;
}
	</style>
</head>
<body class="bg">
    
    <?php
        $get = mysqli_query($conn, "SELECT JID FROM job");
        $option = '';
        while($row = mysqli_fetch_assoc($get))
        {
        $option .= '<option value = "'.$row['JID'].'">'.$row['JID'].'</option>';
        }
    ?>

    <form class="e2" action="" method="post" id="search">
    	  <div class="iv">
    	    <label>Job ID:</label>
            </div>
        <select name="jobid"> 
            <?php echo $option; ?>
        </select>
        <br>
        <input type="submit" name="SubmitButton"/>
    </form>
    <input type="button" name="signout" value="signout" onclick="logout.php">
</body>
</html>
