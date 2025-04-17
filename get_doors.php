<?php
// Include database connection or configuration file
include_once "Resource/connect_db.php";

// Fetch book ID from POST data
$bookID = $_POST['bookID'];

// Validate book ID
if (!empty($bookID)) {
  // Construct the SQL query to fetch doors based on the selected BookID
  $query = "SELECT DoorID, DoorNumber FROM doors WHERE BookID = $bookID";

  // Execute query
  $result = mysqli_query($conn, $query);

  if ($result) {
    // Initialize options variable
    $options = "<option value=''>حدد الباب</option>";

    // Fetch data and append options
    while ($row = mysqli_fetch_assoc($result)) {
      $options .= "<option value='{$row['DoorID']}'>{$row['DoorNumber']}</option>";
    }

    // Output options
    echo $options;
  } else {
    // If query fails, return an error message
    echo "Error: " . mysqli_error($conn);
  }
} else {
  // If book ID is empty, return a message
  echo "No book ID provided.";
}
