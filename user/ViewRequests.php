<?php
session_start();
include("header2.php");
include("connection.php");
$u = $_SESSION["EmailId"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Donor Dashboard</title>
</head>

<body>
    <h1>Donor Dashboard</h1>

    <h2>Requests Received</h2>

    <table class=table>
        <thead>
            <tr>
                <th>Recepient Name</th>
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
            $query = "SELECT * FROM requests WHERE DonorId = '$u'";
            $result = mysqli_query($cn, $query);

            // Display the requests
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    extract($row);
                    echo "<tr>";
                    echo "<td>$Name</td> <td>$BloodGroup</td> <td>$Age</td> <td>$Gender</td><td>$Date</td>";
                    echo '<form method="post" action="showDonorBanks.php">';
                    echo '<input type="hidden" name="donorId" id="donorId" value="' . $row['DonorId'] . '">';
                    echo '<input type="hidden" name="requestId" id="requestId" value="' . $row['RequestId'] . '">';
                    echo '<input type="hidden" name="location" id="location" value="' . $row['Location'] . '">';
                    echo '<input type="hidden" name="date" id="date" value="' . $row['Date'] . '">';
                    echo '<td><button type="submit"class="btn btn-primary"id="btnsub"name=btnsub>Accept</button></td>';
                    echo '</form>';
                    echo "</tr>";

                    if (isset($_POST['btnsub'])) {
                        echo "<script>window.location='showDonorBanks.php'</script>";

                    }
                }
            }
            ?>

</body>

</html>