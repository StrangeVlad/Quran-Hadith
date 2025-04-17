<?php
// Include database connection or configuration file
include_once "Resource/connect_db.php";

// Fetch collections from the database
$query = "SELECT CollectionID, CollectionName FROM collections";
$result = mysqli_query($conn, $query); // Use $conn instead of $connection

$options = "<option value=''>حدد المجموعة</option>";
while ($row = mysqli_fetch_assoc($result)) {
  $options .= "<option value='{$row['CollectionID']}'>{$row['CollectionName']}</option>";
}

echo $options;
