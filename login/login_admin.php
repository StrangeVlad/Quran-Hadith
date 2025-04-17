<?php
include_once "../Resource/session.php";
include_once "../Resource/connect_db.php";
$userLogin = $passLogin = $emptyuser = '';
if (isset($_POST['btn'])) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if (empty($username) || empty($password)) {
      $emptyuser = "please fill all inputs sir";
    } else {

      $checkusername_Query = "SELECT adminID, username, password FROM admin WHERE username = ?";
      $stmt_check_username = $conn->prepare($checkusername_Query);
      $stmt_check_username->bind_param('s', $username);
      $stmt_check_username->execute();
      $result_check_username = $stmt_check_username->get_result();

      if ($result_check_username->num_rows > 0) {
        $user = $result_check_username->fetch_assoc();

        if ($password === $user['password']) {
          $_SESSION['admin_id'] = $user['adminID'];
          $_SESSION['username'] = $user['username'];
          $admin_id = $_SESSION['admin_id'];
          $userr = $_SESSION['username'];

          $stmt_check_username->close();
          $conn->close();

          header("Location: ../Dashboard_admin.php");
          exit();
        } else {
          $passLogin = "<p style='color:red;'>Invalid password.</p>";
        }
      } else {
        $userLogin = "<p style='color:red;'>This username does not exist.</p>";
      }

      $stmt_check_username->close();
      $conn->close();
    }
  }
}
