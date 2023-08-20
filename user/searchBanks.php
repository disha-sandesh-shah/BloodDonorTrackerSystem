<?php
include("header2.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blood Donation Website</title>
</head>
<body>

    <form method="get" action="showBanks.php">

        <label for="location">Location:</label>
        <input type="text" name="location" id="location">

        <button type="submit" class="btn btn-primary" id="btnsub">Filter</button>
    </form>
</body>
</html>
