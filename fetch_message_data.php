<?php

include_once 'Resource/connect_db.php';
include_once 'Resource/session.php';

// Check if the keys exist in $_POST, otherwise set default values
$start = $_POST['start'] ?? 0;
$length = $_POST['length'] ?? -1; // default value can be adjusted as needed
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;

$sql = "SELECT * FROM messages";
$countSql = "SELECT COUNT(*) AS total FROM messages";

if (isset($_POST['search']['value'])) {
  $search_value = $_POST['search']['value'];
  $sql .= " WHERE (name LIKE '%" . $search_value . "%'";
  $sql .= " OR email LIKE '%" . $search_value . "%'";
  $sql .= " OR subject LIKE '%" . $search_value . "%'";
  $sql .= " OR message LIKE '%" . $search_value . "%')";

  $countSql .= " WHERE (name LIKE '%" . $search_value . "%'";
  $countSql .= " OR email LIKE '%" . $search_value . "%'";
  $countSql .= " OR subject LIKE '%" . $search_value . "%'";
  $countSql .= " OR message LIKE '%" . $search_value . "%')";
}

if (isset($_POST['order'])) {
  $column = $_POST['order'][0]['column'];
  $order = $_POST['order'][0]['dir'];
  $columns = array('name', 'email', 'subject', 'message'); // Add more columns if needed
  $sql .= " ORDER BY " . $columns[$column] . " " . $order;
} else {
  $sql .= " ORDER BY id ASC"; // Assuming the primary key column is named 'id'
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
    $subarray[] = $row['id']; // Assuming the primary key column is named 'id'
    $subarray[] = $row['name'];
    $subarray[] = $row['email'];
    $subarray[] = $row['subject'];
    $subarray[] = $row['message'];
    $subarray[] = $row['created_at'];
    // Add delete button with appropriate data-id attribute
    $subarray[] = '<a href="javascript:void();" data-id="' . $row['id'] . '" class="btn btn-sm btn-danger btnDelete">حذف</a>';
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
