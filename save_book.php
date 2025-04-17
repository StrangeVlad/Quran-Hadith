<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Include your database connection file
  include_once "Resource/connect_db.php";

  // Get form data
  $collectionID = $_POST["collection-Select"];
  $book_name_ab = $_POST["book_name_ab"];
  $book_name_en = $_POST["book_name_en"];
  $des_book_ab = $_POST["DesBookAb"];
  $des_book_en = $_POST["DesBookEn"];

  // Perform any necessary validation of the form data

  // Insert the data into the database
  $query = "INSERT INTO books (CollectionID, BookName, BookNameEnglish, DescriptionArabic, DescriptionEnglish) VALUES (?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "issss", $collectionID, $book_name_ab, $book_name_en, $des_book_ab, $des_book_en);

  if (mysqli_stmt_execute($stmt)) {
    // If insertion is successful, return a success message or any other response
    echo "Book added successfully!";
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
