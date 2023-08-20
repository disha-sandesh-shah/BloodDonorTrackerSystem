<?php
session_start();
include("header.php");
include("connection.php");
$location = $_POST['location'];
$donorId = $_SESSION["EmailId"];
$query = "SELECT * FROM registration WHERE EmailId = '$donorId'";
$result = mysqli_query($cn, $query);

// Display the filtered donors
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $donorName = $row['Name'];
        $Age = $row['Age'];
        $Gender = $row['Gender'];
        $contact = $row['Contact'];
        $bloodGroup = $row['BloodGroup'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Filtered Banks</title>
</head>

<body>
    <h1>Blood Banks Available</h1>

    <table class=table>
        <thead>
            <tr>
                <th>Blood Bank Name</th>
                <th>Contact No.</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // Query the database to get the filtered donors
            $query = "SELECT * FROM bloodbank WHERE Location LIKE '%$location%'";
            $result = mysqli_query($cn, $query);

            // Display the filtered donors
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    extract($row);
                    echo "<tr>";
                    echo "<td>$Name</td> <td>$Contact</td>";
                    echo '<form method="post" name="myForm">';
                    echo '<input type="hidden" name="bloodBank" id="bloodBank" value="' . $row['Name'] . '">';
                    echo '<input type="hidden" name="requestId" id="requestId" value="' . $_POST['requestId'] . '">';
                    echo '<td><button type="submit"class="btn btn-primary"id="btndonate"name="btndonate">Donate</button></td>';
                    echo '</form>';
                    echo "</tr>";
                    echo '</div>';

                    if (isset($_POST['btndonate'])) {
                        extract($_POST);
                        include("connection.php");
                        $bloodBank = $_POST["bloodBank"];
                        $requestId = $_POST["requestId"];
                        $q = "INSERT INTO donationRequests values('$donorId', '$donorName', '$Age', '$Gender', '$contact', '$bloodGroup', '$bloodBank', '$requestId', '$date')";
                        mysqli_query($cn, $q);
                        $q1 = "UPDATE userrequests SET BloodBank = '$bloodBank', Status = 'Accepted', Date = '$date' WHERE RequestId = '$requestId'";
                        mysqli_query($cn, $q1);
                        $q2 = "DELETE from requests WHERE RequestId = '$requestId'";
                        mysqli_query($cn, $q2);
                        mysqli_close($cn);
                        echo "<script>alert('Donation Request sent successfully');window.location='index.php'</script>";
                    }

                }
            } else {
                echo '<p>No blood banks found.</p>';
            }
            ?>
</body>

</html>