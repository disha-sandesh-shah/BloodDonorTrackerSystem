<?php
include("header2.php");
?>

<h2>Blood Banks in System</h2>

<table class=table>
    <thead>
        <tr>
            <th>Actions</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Liscence No.</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("connection.php");
        $q = "select * from bloodbank";
        $rs = mysqli_query($cn, $q);
        while ($a = mysqli_fetch_array($rs)) {
            extract($a);
            $name = $a['Name'];
            $name = urlencode($name);
            echo "<tr>";
            echo "<td><a href = deleteBloodBank.php?Name=$name>Delete</a> <a href = updateBloodBank.php?Name=urlencode($name)>Update</a></td> <td>$Name</td> <td>$Contact</td> <td>$LiscenceNo</td> <td>$Location</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>