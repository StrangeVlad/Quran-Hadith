<?php
// Include database connection or configuration file
include_once "Resource/connect_db.php";

// Fetch books based on collection ID sent via POST
$collectionID = $_POST['collectionID'];

$query = "SELECT BookID, BookName FROM books WHERE CollectionID = $collectionID";
$result = mysqli_query($conn, $query); // Use $conn instead of $connection

$options = "<option value=''>حدد كتاب</option>";
while ($row = mysqli_fetch_assoc($result)) {
  $options .= "<option value='{$row['BookID']}'>{$row['BookName']}</option>";
}

echo $options;
