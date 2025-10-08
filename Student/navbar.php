<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- Font Awesome CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>
<body>
    <header>
        <div class="logo-container">
          <div class="logo">
            <img src="Images/logo3.png" />
          </div>
          <h1>ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
        </div>

        <nav>
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>
        </nav>

        <?php
        if(isset($_SESSION['login_user']))
        {
          ?>
          <div style="color: #d5e0e0; text-decoration: none; font-size: 18px; ">
            <?php
            echo "Welcome ".$_SESSION['login_user'];
            ?>
          </div>
          <div>

            <a href="logout.php" style="color: #d5e0e0; text-decoration: none;">
              <i class="fas fa-sign-out-alt"></i>
              LOGOUT
            </a>
          </div>        
          <?php
        }
        else{
          ?>

          <div class="user-actions">
            <a href="student_login.php">
              <i class="fas fa-sign-in-alt"></i>
              LOGIN
            </a>
            <!-- <a href="">
              <i class="fas fa-sign-out-alt"></i>
              LOGOUT
            </a> -->
            <a href="registration.php">
              <i class="fas fa-user-plus"></i>
              SIGN UP
            </a>
          </div>
          <?php
        }
        ?>
      </header>
</body>
</html>