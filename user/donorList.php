<?php
session_start();
include("header2.php");
include("connection.php");
$u = $_SESSION['EmailId'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Filtered Donors</title>
</head>

<body>

    <?php
    // Get the selected blood group and location from the form
    $blood_group = $_GET['blood-group'];
    $location = $_GET['location'];

    // Query the database to get the filtered donors
    $query = "SELECT * FROM registration WHERE BloodGroup = '$blood_group' AND Location LIKE '%$location%' AND EmailId != '$u'";
    $result = mysqli_query($cn, $query);

    // Display the filtered donors
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Filtered Donors</h1>";

        echo "<table class = table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Blood Group</th>";
        echo "<th>Age</th>";
        echo "<th>Gender</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($a = mysqli_fetch_assoc($result)) {
            extract($a);
            echo '<form method="post" action="send_request.php">';
            echo "<tr>";
            echo "<td>$Name</td> <td>$BloodGroup</td> <td>$Age</td> <td>$Gender</td>";
            echo '<input type="hidden" name="donor_id" id="donor_id" value="' . $a['EmailId'] . '">';
            echo '<input type="hidden" name="name" id="name" value="' . $a['Name'] . '">';
            echo '<input type="hidden" name="location" id="location" value="' . $a['Location'] . '">';
            echo "<td><button type='submit' class='btn btn-primary'>Send Request</button></td>";
            echo "</tr>";
            echo '</form>';
            echo '</div>';
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No donors found";
    }

    // Close the database connection
    mysqli_close($cn);
    ?>
</body>

</html>