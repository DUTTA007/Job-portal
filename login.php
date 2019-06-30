<html>
         <head>
            <link rel="stylesheet" href="register.css">
             <style>
        body, html {
    height: 100%;
}

.bg { 
    background-image: url("images/7.jpg");

    height: 100%; 

    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
                 .e2{
                     margin-left: 4%;
                 }
    </style>

         </head>
      <body>
          
          <div class="bg">
              <div class="e2">
                   <button onclick="window.location.href='index.html'">BACK</button>
              </div>
          <div class="d">
         <form action="" method="POST">
         <label for="usn">USN</label>
        <input type="text" id="usn" name="usn" placeholder="Your usn.." required>
      <label for="pwd">Password</label>
        <input type="password" id="pwd" name="password" placeholder="Your Password.." required>
        <input type="submit" value="SUBMIT" font-size=20%>
       </form>
              </div></div>
    </body>
</html>

<?php
   include("dbconn.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      
      $myusername = mysqli_real_escape_string($conn,$_POST['usn']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM student WHERE USN = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      //printf ("%s (%s)\n",$row["Lastname"],$row["Age"]);
      $count = mysqli_num_rows($result);
         
		
      if($count == 1) {
         $_SESSION['Name'] = $row["Name"];
         $_SESSION['USN'] = $row["USN"];
         $_SESSION['SID'] = $row['SID'];
         $_SESSION['TenMarks'] = $row['TenMarks'];
         $_SESSION['TwelveMarks'] = $row['TwelveMarks'];
         $_SESSION['EnggMarks'] = $row['EnggMarks'];
         header("location: JobDisplay1.php");
      }else {
         $error = "<h1>Your Login Name or Password is invalid</h1>";
         echo $error;
      }
   }
?>