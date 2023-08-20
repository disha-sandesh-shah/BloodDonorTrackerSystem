<?php
include("header2.php");
?>

<h2>Requests in System</h2>

<table class=table>
    <thead>
        <tr>
            <th>Actions</th>
            <th>Request ID</th>
            <th>Receiver's Name</th>
            <th>Donor's Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Blood Group</th>
            <th>Location</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("connection.php");
        $q = "select * from userrequests";
        $rs = mysqli_query($cn, $q);
        while ($a = mysqli_fetch_array($rs)) {
            extract($a);
            $requestId = $a['RequestId'];
            echo "<tr>";
            echo "<td><a href = deleteRequest.php?RequestId=$requestId>Delete</a> <td>$RequestId</td> <td>$Name</td> <td>$DonorName</td> <td>$Age</td> <td>$Gender</td> <td>$BloodGroup</td> <td>$Location</td> <td>$Status</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>