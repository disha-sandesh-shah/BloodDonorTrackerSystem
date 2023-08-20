<?php
include("header2.php");
?>

<h2>Users in System</h2>

<table class=table>
    <thead>
        <tr>
            <th>Actions</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Blood Group</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("connection.php");
        $q = "select * from registration";
        $rs = mysqli_query($cn, $q);
        while ($a = mysqli_fetch_array($rs)) {
            extract($a);
            $email = $a['EmailId'];
            echo "<tr>";
            echo "<td><a href = del3.php?EmailId=$email>Delete</a> <a href = up.php?EmailId=$email>Update</a></td> <td>$Name</td> <td>$Contact</td> <td>$Age</td> <td>$Gender</td> <td>$BloodGroup</td> <td>$Location</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>