<?php
session_start();
include("header2.php");
$email = $_SESSION['EmailId'];
?>

<h2>Your Requests to Receive Blood</h2>

<table class=table>
    <thead>
        <tr>
            <th>Action</th>
            <th>Request ID</th>
            <th>Donor Name</th>
            <th>Request Status</th>
            <th>Blood Bank</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("connection.php");
        $q = "select * from userrequests where EmailId = '$email'";
        $rs = mysqli_query($cn, $q);
        while ($a = mysqli_fetch_array($rs)) {
            extract($a);
            echo "<tr>";
            echo "<td><a href = deleteUserRequest.php?RequestId=$RequestId>Delete</a> <td>$RequestId</td> <td>$DonorName</td> <td>$Status</td> <td>$BloodBank</td> <td>$Date</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>