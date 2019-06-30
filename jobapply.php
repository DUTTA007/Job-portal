<?php
include 'dbconn.php';
session_start();
$sid = $_SESSION['SID'];
$sten = $_SESSION['TenMarks'];
$stwel = $_SESSION['TwelveMarks'];
$seng = $_SESSION['EnggMarks'];
//echo "$stwel";
if(isset($_POST['SubmitButton'])){
	$jid = $_POST['jobid'];
	//echo "$jid";
	$query = "SELECT TenCutOff, TwelveCutOff, EnggCutOff FROM job where JID = '$jid' ";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result)) {
			$ten = $row['TenCutOff'];
			$twelve = $row['TwelveCutOff'];
			$engg = $row['EnggCutOff'];
			//echo "$engg";
			if(($sten >= $ten) && ($stwel >= $twelve) && ($seng= $engg)){
				$query1 = "SELECT SID,JID FROM jobapplied where JID = $jid AND SID = $sid";
				$res = mysqli_query($conn,$query1);
				if(mysqli_num_rows($res) == 0){
				// while ($row1 = mysqli_fetch_array($res)) {
				// if($sid == $row1['SID'] && $jid ==$row1['JID']){
				$sql = "INSERT INTO jobapplied(SID,JID) VALUES('$sid','$jid')";
				echo "Thanks for applying to the job";
				mysqli_query($conn,$sql);
			}
			else 
				echo "You Have already applied for this job";
		//}
			}
		//}
			else
				echo "You do not have enough percentage";
		}
	}
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
        <input type="submit" name="SubmitButton"/></br></br>
       <!-- <button type="button"><a href = "logout.php">Sign Out</a></button> -->
    </form>

        <input type="button" name="signout" value="signout" onclick="logout.php">
</body>
</html>