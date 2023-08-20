<?php
session_start();
include("header2.php");
include("connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Filtered Banks</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    // Get the selected blood group and location from the for
    $location = $_GET['location'];

    // Query the database to get the filtered donors
    $query = "SELECT * FROM bloodbank WHERE Location LIKE '%$location%'";
    $result = mysqli_query($cn, $query);

    // Display the filtered donors
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Blood Banks Available</h1>";

        echo "<table class = table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Blood Bank Name</th>";
        echo "<th>Contact</th>";
        echo "<th>Location</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($a = mysqli_fetch_assoc($result)) {
            extract($a);
            echo "<tr>";
            echo "<td>$Name</td> <td>$Contact</td> <td>$Location</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    // Close the database connection
    mysqli_close($cn);
    ?>
</body>

</html>