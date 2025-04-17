<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Include your database connection file
  include_once "Resource/connect_db.php";

  // Get form data
  $name = $_POST["name"];
  $description = $_POST["description"];

  // Perform any necessary validation of the form data

  // Insert the data into the database
  $query = "INSERT INTO rawis (Name, Description) VALUES (?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ss", $name, $description);

  if (mysqli_stmt_execute($stmt)) {
    // If insertion is successful, return a success message or any other response
    echo "Rawi added successfully!";
  } else {
    // If insertion fails, return an error message or any other response
    echo "Error: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  // If the form is not submitted via POST method, handle the error accordingly
  echo "Invalid request!";
}
