<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Include your database connection file
  include_once "Resource/connect_db.php";

  // Get form data
  $collectionID = $_POST["select_collection"];
  $bookID = $_POST["select_book"];
  $door_number = $_POST["door_number"];
  $des_door_Ab = $_POST["des_door_Ab"];
  $des_door_En = $_POST["des_door_En"];

  // Perform any necessary validation of the form data

  // Insert the data into the database
  $query = "INSERT INTO doors (CollectionID, BookID, DoorNumber, DescriptionArabic, DescriptionEnglish) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "iiiss", $collectionID, $bookID, $door_number, $des_door_Ab, $des_door_En);

  if (mysqli_stmt_execute($stmt)) {
    // If insertion is successful, return a success message or any other response
    echo "Door added successfully!";
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
