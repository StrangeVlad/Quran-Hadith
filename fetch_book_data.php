<?php
include_once 'Resource/connect_db.php';

// Check if the keys exist in $_POST, otherwise set default values
$start = $_POST['start'] ?? 0;
$length = $_POST['length'] ?? -1; // default value can be adjusted as needed
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;

// Get the selected CollectionID from the POST data
$collectionID = isset($_POST['collectionID']) ? intval($_POST['collectionID']) : null;

// Construct the SQL query to fetch books based on the selected CollectionID
$sql = "SELECT * FROM books WHERE CollectionID = $collectionID";
$countSql = "SELECT COUNT(*) AS total FROM books WHERE CollectionID = $collectionID";

if (isset($_POST['search']['value'])) {
  $search_value = $_POST['search']['value'];
  $sql .= " AND (BookName LIKE '%" . $search_value . "%'";
  $sql .= " OR DescriptionArabic LIKE '%" . $search_value . "%')";

  $countSql .= " AND (BookName LIKE '%" . $search_value . "%'";
  $countSql .= " OR DescriptionArabic LIKE '%" . $search_value . "%')";
}

if (isset($_POST['order'])) {
  $column = $_POST['order'][0]['column'];
  $order = $_POST['order'][0]['dir'];
  $sql .= " ORDER BY $column $order";
} else {
  $sql .= " ORDER BY BookID ASC"; // Change this to the appropriate column
}

if ($length != -1) {
  $sql .= " LIMIT $start, $length";
}

$query = mysqli_query($conn, $sql);
$countQuery = mysqli_query($conn, $countSql);

if ($query && $countQuery) {
  $data = array();

  while ($row = mysqli_fetch_assoc($query)) {
    $subarray = array();
    $subarray[] = $row['BookID'];
    $subarray[] = $row['BookName'];
    $subarray[] = $row['BookNameEnglish'];
    $subarray[] = $row['DescriptionArabic'];
    $subarray[] = $row['DescriptionEnglish'];
    $subarray[] = '<a href="javascript:void();" data-id="' . $row['BookID'] . '" class="btn btn-sm btn-danger btnDelete">حذف</a>';
    $data[] = $subarray;
  }

  $totalRecords = mysqli_fetch_assoc($countQuery)['total'];

  // For filtered records count, we can use the total records count for now
  // You may need to modify this logic based on your specific requirements
  $filteredRecords = $totalRecords;

  $output = array(
    'data' => $data,
    'draw' => $draw,
    'recordsTotal' => $totalRecords,
    'recordsFiltered' => $filteredRecords,
  );

  echo json_encode($output);
} else {
  echo json_encode(array('error' => mysqli_error($conn)));
}
