<html>
         <head>
            <link rel="stylesheet" href="register.css">
             <style>
          body, html {
          height: 100%;
}
      .bg { 
          background-image: url("images/6.jpg");
          height:200%; 
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          margin-top: -8%;
}
      </style>        </head>
       <body>
          <div class="bg">
          <div class="e">
          <form action="" method="post" onsubmit="return validation()">
          <div></br></br></br></br></br></br></br></br>
          <label for="fname">Name</label>
          <input type="text" id="fname" name="firstname" placeholder="Your name.." autocomplete="off">
          </div>
          <div>
          <label for="usn">USN</label>
          <input type="text" id="usn" name="usn" pattern="[0-9][a-zA-Z][a-zA-Z][0-9][0-9][a-zA-Z][a-zA-Z][0-9][0-9][0-9]" placeholder="Your usn.." autocomplete="off">
          </div><div>
          <label for="pwd">Password</label>
          <input type="password" id="pwd" name="password" placeholder="Your password.." autocomplete="off" ></div><div>
          <label for="pno">PhoneNumber</label>
          <input type="text" id="pno" name="phonenumber" onclick="phonecheck(phnno)" maxlength="10" minlength="10" placeholder="Your phone number" autocomplete="off">
          </div><div>   
          <label for="Dept">Department</label>
          <select id="dept" name="Dept">
          <option value="ise">ISE</option>
          <option value="cse">CSE</option>
          <option value="EC">ECE</option>
          <option value="ME">ME</option>
          <option value="Civil">CIV</option> </select>  </div>
          <div>
          <label for="image">Appload your image</label>
          <input type="file" name="pic" accept="image/*">
          </div><div>
          <label for="sslc">10th marks </label>
          <input type="text" id="sslc" name="sslc" placeholder="Your 10th marks.." required>
          </div> <div>
          <label for="PUC">12th marks</label>
          <input type="text" id="PUC" name="PUC" placeholder="Your 12th marks.." required></div><div>
          <label for="ug">UG marks</label>
          <input type="text" id="ug" name="Engg" placeholder="Your ug marks.." required>
          </div> <div>
          <label for="email">Email</label>
          <input type="text" id="email" name="email" placeholder="Your email" required>
        <!--  <input type="submit" value="SUBMIT" font-size=20%> -->
          </div> <div>     
          <input type="submit" value="submit" id="sub" font-size=20%></div>
          </form>
          </div></div>
          <script type="text/javascript">
              function validation(){
               var user=document.getElementById('fname').value;
               var usn=document.getElementById('usn').value;
               var pwd=document.getElementById('pwd').value;
               var phno=document.getElementById('pno').value;
               if(user==""){
               alert(document.getElementById('fname').innerHTML="pleae enter the name");
               return false;
                }
               if(usn==""){
               alert(document.getElementById('usn').innerHTML="pleae enter the usn");
               return false;
               }
                  
                  if(pwd==""||pwd.length<=2 ||pwd.length>15){
             alert(document.getElementById('pwd').innerHTML="pleae enter the pwd within range 3-15");
                      return false;
                      
                  }
                  
                  if(phno==""){
             alert(document.getElementById('pno').innerHTML="pleae enter the phonenumber");
                      return false;
                      
                  }
                  if(user.length<=2 ||user.length>15){
             alert(document.getElementById('fname').innerHTML="User name should contain 2-15 characters only ");
                      return false;
                      
                  }
                 if(!NaN(user)){
             alert(document.getElementById('fname').innerHTML="please");
                      return false;
                      
                }
                  
              }
          </script>   
    </body>
</html>
<?php
include "dbconn.php";
if(isset($_POST['firstname']) && isset($_POST['password']) && isset($_POST['phonenumber']) && isset($_POST['Dept']) && isset($_POST['usn']) && isset($_POST['pic']) && isset($_POST['PUC']) && isset($_POST['sslc']) && isset($_POST['email']) && isset($_POST['Engg']) ){

$name = $_POST['firstname'];
$password = $_POST['password'];
$phno = $_POST['phonenumber'];
$dept = $_POST['Dept'];
$usn = $_POST['usn'];
$image = $_POST['pic'];
$puc = $_POST['PUC'];
$sslc = $_POST['sslc'];
$email = $_POST['email'];
$Engg = $_POST['Engg'];

$query= "INSERT INTO student(Name,USN,Dept,PhoneNumber,Password,Image,TenMarks,EnggMarks,TwelveMarks,Email) VALUES('$name','$usn','$dept','$phno','$password','$image','$sslc','$Engg','$puc','$email')";
mysqli_query($query,$conn);
if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
}
?>
        