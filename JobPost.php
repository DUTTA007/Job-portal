<html>
<head>
	<title></title>
  <style>
  .bg{
    background-color: #d3ead8;
  }
  .e1{

  }
  input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
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
.w2{
    margin-left: 90%;
    color: white;
  }
</style>
</head>
<body class="bg">
  <div class="e1">
   <center> <h1 style="color: maroon"> JOB DESCRIPTION</h1></center>
  </div>
  <div class="w2">
     <button onclick="window.location.href='hrjobdisplay.php'">BACK</button>
  </div>
<form action="" class ="e2" method="POST" enctype="multipart/form-data">
  Job Title: <br>
  <input type="text" name="title"><br>
  Description: <br>
  <textarea rows="10" cols="35" name="Description"></textarea><br>
  Tenth cut off: <br>
  <input type="text" name="ten"><br>
  Puc cut off: <br>
  <input type="text" name="puc"><br>
  Engineering cut off: <br>
  <input type="text" name="engg"><br>
  Job Description: <br>
  <input type="file" name="pdf_file" accept="application/pdf" /><br>

  <input type="submit" value="Submit">
</form>
</body>
</html>


<?php
   include('dbconn.php');
   //session_start();
   //jd = $_POST['engg'];
   //echo "$jd";
   if(isset($_POST['title']) && isset($_POST['Description']) && isset($_POST['ten']) && isset($_POST['puc']) && isset($_POST['engg'])){
   $title = $_POST['title'];
   $Description = $_POST['Description'];
   $ten = $_POST['ten'];
   $puc = $_POST['puc'];
   //$jd = $_POST['jd'];
   $engg = $_POST['engg'];
   //echo"<pre>".print_r($_FILES,true)."</pre>";
   $target = "uploads/pdf/";
   $target = $target . basename( $_FILES['pdf_file']['name']);

//This gets all the other information from the form
   $Filename=basename( $_FILES['pdf_file']['name']);
   move_uploaded_file($_FILES['pdf_file']['tmp_name'], $target);
   $query = "INSERT INTO job (JID, Name, Description, TenCutOff, TwelveCutOff,EnggCutOff, JD) VALUES (NULL, '$title','$Description','$ten','$puc','$engg','$Filename')";

   mysqli_query($conn,$query);
   if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
	} 
	else {
    echo "Error: " . $query . "<br>" . $conn->error;
	}



   }
?>