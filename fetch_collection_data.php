<?php

include_once 'Resource/connect_db.php';
include_once 'Resource/session.php';

// Check if the keys exist in $_POST, otherwise set default values
$start = $_POST['start'] ?? 0;
$length = $_POST['length'] ?? -1; // default value can be adjusted as needed
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;

$sql = "SELECT * FROM collections";
$countSql = "SELECT COUNT(*) AS total FROM collections";

if (isset($_POST['search']['value'])) {
  $search_value = $_POST['search']['value'];
  $sql .= " WHERE (CollectionName LIKE '%" . $search_value . "%'";
  $sql .= " OR Author LIKE '%" . $search_value . "%'";
  $sql .= " OR Description LIKE '%" . $search_value . "%')";

  $countSql .= " WHERE (CollectionName LIKE '%" . $search_value . "%'";
  $countSql .= " OR Author LIKE '%" . $search_value . "%'";
  $countSql .= " OR Description LIKE '%" . $search_value . "%')";
}

if (isset($_POST['order'])) {
  $column = $_POST['order'][0]['column'];
  $order = $_POST['order'][0]['dir'];
  $sql .= " ORDER BY $column $order";
} else {
  $sql .= " ORDER BY CollectionID ASC";
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
    $subarray[] = $row['CollectionID'];
    $subarray[] = $row['CollectionName'];
    $subarray[] = $row['CollectionNameEnglish'];
    $subarray[] = $row['Author'];
    $subarray[] = $row['AuthorEnglish'];
    $subarray[] = $row['Description'];
    $subarray[] = '<a href="javascript:void();" data-id="' . $row['CollectionID'] . '" class="btn btn-sm btn-danger btnDelete">حذف</a>';
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
