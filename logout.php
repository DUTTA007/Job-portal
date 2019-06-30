<?php
session_start();
$_SESSION['SID'] = "";
//$_SESSION['EID'] = "";
session_destroy();
header('Location:index.html');
?>