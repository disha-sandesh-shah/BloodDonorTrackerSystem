<?php
session_start();
include("header2.php");
include("connection.php");
$bloodBank = $_SESSION["BBName"];
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Blood Bank Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Blood Bank Dashboard</h1>

    <h2>Requests Received</h2>
    <table class=table>
        <thead>
            <tr>
                <th>Donor Name</th>
                <th>Email ID</td>
                <th>Blood Group</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query the database to get the requests received by this donor
            $query = "SELECT * FROM donationRequests WHERE BloodBank = '$bloodBank'";
            $result = mysqli_query($cn, $query);

            // Display the requests
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    extract($row);
                    echo "<tr>";
                    echo "<td>$DonorName</td> <td>$DonorId</td> <td>$BloodGroup</td> <td>$Age</td> <td>$Gender</td> <td>$Date</td>";
                    echo '<form method="post">';
                    echo '<input type="hidden" name="donorId" id="donorId" value="' . $row['DonorId'] . '">';
                    echo '<input type="hidden" name="donorName" id="donorName" value="' . $row['DonorName'] . '">';
                    echo '<input type="hidden" name="Age" id="Age" value="' . $row['Age'] . '">';
                    echo '<input type="hidden" name="Gender" id="Gender" value="' . $row['Gender'] . '">';
                    echo '<input type="hidden" name="bloodGroup" id="bloodGroup" value="' . $row['BloodGroup'] . '">';
                    echo '<input type="hidden" name="requestId" id="requestId" value="' . $row['RequestId'] . '">';
                    echo '<td><button type="submit"class="btn btn-primary"id="btnsub"name=btnsub>Accept</button></td>';
                    echo '</form>';
                    echo "</tr>";
                    echo '</div>';
                }

                if (isset($_POST['btnsub'])) {
                    extract($_POST);
                    $requestId = $_POST['requestId'];
                    include("connection.php");
                    $donorId = $_POST["donorId"];
                    $donorName = $_POST["donorName"];
                    $Age = $_POST["Age"];
                    $Gender = $_POST["Gender"];
                    $bloodGroup = $_POST["bloodGroup"];
                    $q = "insert into donations values('$bloodBank', '$donorId', '$donorName', '$Age', '$Gender', '$bloodGroup')";
                    mysqli_query($cn, $q);
                    $q = "UPDATE userrequests SET Status = 'Donated' WHERE RequestId = '$requestId'";
                    mysqli_query($cn, $q);
                    $q = "DELETE FROM donationRequests WHERE RequestId = '$requestId'";
                    mysqli_query($cn, $q);
                    mysqli_close($cn);
                    echo "<script>alert('Donation Request Accepted successfully')</script>";
                }
            }

            ?>

</body>

</html>