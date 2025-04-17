<?php
// Include database connection or configuration file
include_once "Resource/connect_db.php";

// Fetch types from the database
$query = "SELECT TypeID, typ_name FROM types";
$result = mysqli_query($conn, $query); // Use $conn instead of $connection

$options = "<option value=''>Select Type</option>";
while ($row = mysqli_fetch_assoc($result)) {
  $options .= "<option value='{$row['TypeID']}'>{$row['typ_name']}</option>";
}

echo $options;
