<?php
// Include database connection or configuration file
include_once "Resource/connect_db.php";

// Fetch rawis from the database
$query = "SELECT RawiID, Name FROM rawis";
$result = mysqli_query($conn, $query); // Use $conn instead of $connection

$options = "<option value=''>اختر الراوي</option>";
while ($row = mysqli_fetch_assoc($result)) {
  $options .= "<option value='{$row['RawiID']}'>{$row['Name']}</option>";
}

echo $options;
