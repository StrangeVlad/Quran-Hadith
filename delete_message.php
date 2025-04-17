<?php
// Include necessary files for database connection
include_once 'Resource/connect_db.php';
include_once 'Resource/session.php';

// Check if message ID is provided via POST request
if (isset($_POST['id'])) {
  // Sanitize the input to prevent SQL injection
  $messageID = mysqli_real_escape_string($conn, $_POST['id']);

  // Construct the SQL query to delete the message
  $sql = "DELETE FROM messages WHERE id = '$messageID'";

  // Execute the delete query
  if (mysqli_query($conn, $sql)) {
    // If deletion is successful, return success message
    echo "Message deleted successfully";
  } else {
    // If there's an error in deletion, return error message
    echo "Error deleting message: " . mysqli_error($conn);
  }
} else {
  // If message ID is not provided, return error message
  echo "Error: Message ID not provided";
}
