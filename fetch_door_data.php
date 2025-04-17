<?php
include_once 'Resource/connect_db.php';

// Check if the keys exist in $_POST, otherwise set default values
$start = $_POST['start'] ?? 0;
$length = $_POST['length'] ?? -1; // default value can be adjusted as needed
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;

// Get the selected BookID from the POST data
$bookID = isset($_POST['bookID']) ? intval($_POST['bookID']) : null;

// Initialize output array
$output = [
  'draw' => $draw,
  'recordsTotal' => 0,
  'recordsFiltered' => 0,
  'data' => [],
];

// Validate bookID
if ($bookID !== null) {
  // Construct the SQL query to fetch doors based on the selected BookID
  $sql = "SELECT * FROM doors WHERE BookID = $bookID";
  $countSql = "SELECT COUNT(*) AS total FROM doors WHERE BookID = $bookID";

  // Execute query
  $query = mysqli_query($conn, $sql);
  $countQuery = mysqli_query($conn, $countSql);

  if ($query && $countQuery) {
    $totalRecords = mysqli_fetch_assoc($countQuery)['total'];

    // For filtered records count, we can use the total records count for now
    // You may need to modify this logic based on your specific requirements
    $filteredRecords = $totalRecords;

    while ($row = mysqli_fetch_assoc($query)) {
      $output['data'][] = [
        $row['DoorID'],
        $row['DoorNumber'], // Assuming this is the correct column name
        $row['DescriptionArabic'], // Assuming this is the correct column name
        $row['DescriptionEnglish'], // Assuming this is the correct column name
        '<a href="javascript:void();" data-id="' . $row['DoorID'] . '" class="btn btn-sm btn-danger btnDelete">حذف</a>'
      ];
    }

    $output['recordsTotal'] = $totalRecords;
    $output['recordsFiltered'] = $filteredRecords;
  } else {
    $output['error'] = mysqli_error($conn);
  }
}

// Output JSON
echo json_encode($output);
