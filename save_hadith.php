<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Include your database connection file
  include_once "Resource/connect_db.php";

  // Get form data
  $collectionID = $_POST["collection_select"];
  $bookID = $_POST["book_select"];
  $doorID = $_POST["door_select"];
  $typeID = $_POST["type_select"]; // New field for type
  $rawiID = $_POST["rawi_select"]; // New field for rawi
  $hadith_ab = $_POST["hadithAb"];
  $hadith_en = $_POST["hadithEn"];

  // Perform any necessary validation of the form data

  // Insert the data into the database
  $query = "INSERT INTO hadith (CollectionID, BookID, DoorID, RawiID, HadithArabic, HadithEnglish,TypeID) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "iiiissi", $collectionID, $bookID, $doorID,  $rawiID, $hadith_ab, $hadith_en, $typeID);

  if (mysqli_stmt_execute($stmt)) {
    // If insertion is successful, return a success message or any other response
    echo "Hadith added successfully!";
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
