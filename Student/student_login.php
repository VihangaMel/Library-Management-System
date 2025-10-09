<?php
include "connection.php";
include "navbar.php";

// Initialize message variables
$message = "";
$messageClass = "";

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $res = mysqli_query($db, "SELECT * FROM `student` WHERE username='$username' AND password='$password';");
  $count = mysqli_num_rows($res);

  if ($count == 0) {
    $message = "⚠️ The username and password don't match.";
    $messageClass = "message-error";
  } else {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['login_user'] = $username;
    $_SESSION['pic'] = $row['profile_picture'];
    $message = "✅ Login successful! Redirecting...";
    $messageClass = "message-success";

    // Delay redirect to show message
    echo "<script>
      setTimeout(function() {
        window.location.href = 'index.php';
      }, 1500);
    </script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Login</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    .message-box {
      display: none;
      padding: 15px;
      margin: 20px auto;
      width: 80%;
      text-align: center;
      border-radius: 5px;
      font-size: 16px;
    }
    .message-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    .message-error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <section>
      <div class="stdLogin_img">
        <div class="box1">
          <h1 style="text-align: center; font-size: 35px; font-family: serif; color: white;">
            Library Management System
          </h1>
          <h2 style="text-align: center; font-size: 25px; color: white;">
            User Login Form
          </h2>

          <!-- Message Box -->
          <div id="message" class="message-box"></div>

          <!-- Login Form -->
          <form name="Login" action="" method="post">
            <div class="Login">
              <input class="form-control" type="text" name="username" placeholder="Username" required><br><br>
              <input class="form-control" type="password" name="password" placeholder="Password" required><br><br>
              <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px;">
            </div>

            <p style="color: white; padding-left: 10px">
              <br><br>
              <a style="color: white" href="update_password.php">Forgot password?</a> &nbsp;&nbsp;&nbsp; New to this website?
              <a style="color: white" href="registration.php">Sign Up</a>
            </p>
          </form>
        </div>
      </div>
    </section>
  </div>

  <?php if (!empty($message)): ?>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const msgBox = document.getElementById("message");
        msgBox.classList.add("<?php echo $messageClass; ?>");
        msgBox.textContent = "<?php echo $message; ?>";
        msgBox.style.display = "block";
      });
    </script>
  <?php endif; ?>
</body>
</html>
