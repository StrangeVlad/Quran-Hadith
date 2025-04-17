<?php
// Include your database connection file
include_once "Resource/connect_db.php";

if (isset($_POST['id'])) {
  $id = $_POST['id'];

  // Perform delete operation
  $query = "DELETE FROM books WHERE BookID = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);

  if (mysqli_stmt_execute($stmt)) {
    echo "Row deleted successfully!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  // Close the prepared statement and database connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  echo "Invalid request!";
}
