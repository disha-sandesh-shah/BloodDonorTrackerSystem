<?php
session_start();
include("connection.php");
$donorId = $_SESSION["EmailId"];

// Query the database
$sql = "SELECT * FROM donations where DonorId = '$donorId'";
$result = mysqli_query($cn, $sql);

$date = date("Y-m-d");

// Generate the report
if (mysqli_num_rows($result) > 0) {
    echo "<h1>Donations By This User</h1>";
    // Output table header

    echo "<p>Date: " . $date . "</p>";

    echo "<table style='border-collapse: collapse;'>";
    echo "<tr><th style='border: 1px solid black; padding: 5px;'>Blood Bank</th><th style='border: 1px solid black; padding: 5px;'>Donor Name</th><th style='border: 1px solid black; padding: 5px;'>Age</th><th style='border: 1px solid black; padding: 5px;'>Gender</th><th style='border: 1px solid black; padding: 5px;'>Blood Group</th></tr>";

    // Output table rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td style='border: 1px solid black; padding: 5px;'>" . $row["BloodBank"] . "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["DonorName"] . "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["Age"] . "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["Gender"] . "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["BloodGroup"] . "</td></tr>";
    }

    // Output table footer
    echo "</table>";
    echo "<br>";
    echo "<br>";
    echo "<button onclick='window.print()'>Print Report</button>";
} else {
    echo "0 results";
}

// Close the database connection
mysqli_close($cn);
?>