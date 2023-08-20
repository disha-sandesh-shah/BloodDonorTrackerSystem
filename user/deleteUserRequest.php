<?php
$requstId = $_GET['RequestId'];
include("connection.php");
$q = "delete from requests where RequestId = '$requstId'";
mysqli_query($cn, $q);
$q = "delete from userrequests where RequestId = '$requstId'";
mysqli_query($cn, $q);
mysqli_close($cn);
echo "<script>alert('Request Deleted Successfully');window.location='Status.php';</script>";
?>