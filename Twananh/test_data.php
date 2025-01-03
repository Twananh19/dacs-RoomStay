<?php
include 'db_connect.php';

$sql = "SELECT * FROM Guest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['guest_id'] . " - Name: " . $row['name'] . "<br>";
    }
} else {
    echo "No data found.";
}
$conn->close();
?>
