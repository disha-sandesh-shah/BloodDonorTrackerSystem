<?php
$name = $_GET[urldecode('Name')];
include("connection.php");
$q = "delete from BloodBank where Name = '$name'";
mysqli_query($cn, $q);
mysqli_close($cn);
echo "<script>alert('Blood Bank Record Deleted Successfully');window.location='ManageBloodBanks.php';</script>";
?>