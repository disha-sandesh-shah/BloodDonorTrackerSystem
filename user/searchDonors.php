<?php
session_start();
include("header2.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Blood Donation Website</title>
</head>

<body>

    <form method="get" action="donorList.php">
        <label for="blood-group">Blood Group:</label>
        <select name="blood-group" id="blood-group">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>

        <label for="location">Location:</label>
        <input type="text" name="location" id="location">

        <button type="submit" class="btn btn-primary" id="btnsub">Filter</button>
    </form>
</body>

</html>