<?php
$email = $_GET['EmailId'];
include("connection.php");
$q = "delete from registration where EmailId = '$email'";
mysqli_query($cn, $q);
mysqli_close($cn);
echo "<script>alert('User Record Deleted Successfully');window.location='ManageUsers.php';</script>";
?>