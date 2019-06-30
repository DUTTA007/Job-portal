
<html>
       <head>
            <link rel="stylesheet" href="register.css">
            <style>
        body, html {
        height: 100%;
}

        .h1{
        }
.bg{ 
    background-image: url("images/7.jpg");
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
                .e2{
                     margin-left: 4%;
                    
            font-size: 30px;
            color: lightyellow;
            align-content: center;
                 }
           </style>

       </head>
        <body>
          <div class="bg">
               <div class="e2">
                  <button onclick="window.location.href='index.html'">BACK</button>
               <center><h1> HR LOGIN</h1></center></div>
             
             
          <div class="d">
          <form action="" method="POST">
          
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Your name.." autocomplete="off"  required>
          
          <label for="pass">Password</label>
          <input type="password" id="pwd" name="password" placeholder="Your password.." autocomplete="off" required>
          <input type="submit" value="SUBMIT" font-size=20%>
          </form>
          </div></div>
        </body>
</html>
<?php
  include("dbconn.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      
      $myusername = mysqli_real_escape_string($conn,$_POST['name']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM hr WHERE Name = '$myusername' and Pass = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      //printf ("%s (%s)\n",$row["Lastname"],$row["Age"]);
      $count = mysqli_num_rows($result);
         
    
      if($count == 1) {
         $_SESSION['EID'] = $row["EID"];
         // $_SESSION['USN'] = $row["USN"];
         
         header("location: hrjobdisplay.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>