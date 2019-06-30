<?php
include "dbconn.php";
session_start();
if(isset($_GET['JID'])){
    $id = $_GET['JID'];
    echo "$id";
    $res = mysqli_query($conn,"select JD from job where JID=$id");
    while ($row = mysqli_fetch_array($res)) {
        $file = 'uploads/pdf/'.$row['JD'];   
        echo $file; 
    }
}
?>