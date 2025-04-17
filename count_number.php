<?php

include_once "Resource/connect_db.php";

$numCollections = 0;
$numBooks = 0;
$numDoors = 0;
$numHadiths = 0;

// Count collections
$sqlCollections = "SELECT COUNT(*) AS num_collections FROM collections";
$resultCollections = $conn->query($sqlCollections);
if ($resultCollections->num_rows > 0) {
  while ($row = $resultCollections->fetch_assoc()) {
    $numCollections = $row["num_collections"];
  }
}

// Count books
$sqlBooks = "SELECT COUNT(*) AS num_books FROM books";
$resultBooks = $conn->query($sqlBooks);
if ($resultBooks->num_rows > 0) {
  while ($row = $resultBooks->fetch_assoc()) {
    $numBooks = $row["num_books"];
  }
}

// Count doors
$sqlDoors = "SELECT COUNT(*) AS num_doors FROM doors";
$resultDoors = $conn->query($sqlDoors);
if ($resultDoors->num_rows > 0) {
  while ($row = $resultDoors->fetch_assoc()) {
    $numDoors = $row["num_doors"];
  }
}

// Count hadiths
$sqlHadiths = "SELECT COUNT(*) AS num_hadiths FROM hadith";
$resultHadiths = $conn->query($sqlHadiths);
if ($resultHadiths->num_rows > 0) {
  while ($row = $resultHadiths->fetch_assoc()) {
    $numHadiths = $row["num_hadiths"];
  }
}

$conn->close();
