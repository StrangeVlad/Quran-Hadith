<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Include your database connection file
  include_once "Resource/connect_db.php";

  // Get form data
  $collection_name_ab = $_POST["collection_name_ab"];
  $collection_name_en = $_POST["collection_name_en"];
  $author_name_ab = $_POST["Author_name_ab"];
  $author_name_en = $_POST["Author_name_en"];
  $description_en = $_POST["des_collection_En"]; // Changed the name to match the form field

  // Perform any necessary validation of the form data

  // Insert the data into the database
  $query = "INSERT INTO collections (CollectionName, CollectionNameEnglish, Author, AuthorEnglish, Description) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sssss", $collection_name_ab, $collection_name_en, $author_name_ab, $author_name_en, $description_en); // Removed the unnecessary $description_en variable

  if (mysqli_stmt_execute($stmt)) {
    // If insertion is successful, return a success message or any other response
    echo "Collection added successfully!";
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
