<?php
include_once 'Resource/connect_db.php';

// Check if the keys exist in $_POST, otherwise set default values
$start = $_POST['start'] ?? 0;
$length = $_POST['length'] ?? -1; // default value can be adjusted as needed
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;

// Get the selected DoorID from the POST data
$doorID = isset($_POST['doorID']) ? intval($_POST['doorID']) : null;

// Initialize output array
$output = [
  'draw' => $draw,
  'recordsTotal' => 0,
  'recordsFiltered' => 0,
  'data' => [],
];

// Validate doorID
if ($doorID !== null) {
  // Construct the SQL query to fetch hadiths based on the selected DoorID
  $sql = "SELECT h.*, t.typ_name AS TypeName, r.Name AS RawiName 
          FROM hadith h
          LEFT JOIN types t ON h.TypeID = t.TypeID
          LEFT JOIN rawis r ON h.RawiID = r.RawiID
          WHERE h.DoorID = $doorID";

  $countSql = "SELECT COUNT(*) AS total FROM hadith WHERE DoorID = $doorID";

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
        $row['HadithID'],
        $row['HadithArabic'],
        $row['HadithEnglish'],
        $row['TypeName'],
        $row['RawiName'],
        '<a href="javascript:void();" data-id="' . $row['HadithID'] . '" class="btn btn-sm btn-danger btnDelete">حذف</a>'
      ];
    }

    $output['recordsTotal'] = $totalRecords;
    $output['recordsFiltered'] = $filteredRecords;
  } else {
    $output['error'] = mysqli_error($conn);
  }
} else {
  $output['error'] = "No DoorID provided";
}

// Output JSON
echo json_encode($output);
