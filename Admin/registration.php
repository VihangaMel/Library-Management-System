<?php
include "connection.php";
include "navbar.php";

// Initialize message variables
$message = "";
$messageClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // Check if username exists
    $stmt = $db->prepare("SELECT COUNT(*) FROM Admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 0) {
        // Insert new user (do NOT include id)
        $profile_picture = 'p.jpg'; // Assign to variable
        $stmt = $db->prepare("INSERT INTO Admin (firstname, lastname, username, password, email, contact, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $fname, $lname, $username, $password, $email, $contact, $profile_picture);
        $stmt->execute();
        $stmt->close();

        $message = "✅ Registration successful!";
        $messageClass = "message-success";
    } else {
        $message = "⚠️ The username already exists.";
        $messageClass = "message-error";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Registration</title>
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
      <div class="reg_img">
        <div class="box2">
          <h1 style="text-align: center; font-size: 35px; font-family: serif; color: white;">
            Library Management System
          </h1>
          <h2 style="text-align: center; font-size: 25px; color: white;">
            User Registration Form
          </h2>

          <!-- Message Box -->
          <div id="message" class="message-box"></div>

          <!-- Registration Form -->
          <form method="POST" action="">
            <div class="Login">
              <input class="form-control" type="text" name="firstname" placeholder="First Name" required><br><br>
              <input class="form-control" type="text" name="lastname" placeholder="Last Name" required><br><br>
              <input class="form-control" type="text" name="username" placeholder="Username" required><br><br>
              <input class="form-control" type="password" name="password" placeholder="Password" required><br><br>
              <input class="form-control" type="email" name="email" placeholder="Email" required><br><br>
              <input class="form-control" type="contact" name="contact" placeholder="Contact" required><br><br>
              <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px;">
            </div>
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
