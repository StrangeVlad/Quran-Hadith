<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <style>
    body {
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card {
      max-width: 400px;
      width: 100%;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card img {
      border-radius: 10px;
    }

    .btn-lg {
      width: 100%;
      /* Make the button width 100% */
    }
  </style>
</head>

<body>
  <?php
  include_once "login_admin.php";
  ?>
  <div class="card">
    <img src="../images/pexels-djamel-ramdani-84328305-15844943.jpg" class="img-fluid mb-3" alt="Welcome back you've been missed!" />
    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
      </div>
      <?php echo $userLogin ?>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
      </div>
      <div class="error">
        <?php echo $passLogin; ?>
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember_me" />
        <label class="form-check-label" for="remember_me">Keep me logged in</label>
      </div>
      <button type="submit" name="btn" class="btn btn-dark btn-lg">
        <!-- Remove btn-block class -->
        Log in
      </button>
    </form>
  </div>
</body>

</html>