<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Library Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- Font Awesome CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  </head>
  <body>
    <div class="wrapper">
      <header>
        <div class="logo-container">
          <div class="logo">
            <img src="Images/logo3.png" />
          </div>
          <h1>ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
        </div>

        <?php
        if(isset($_SESSION['login_user'])){
          ?>
          <nav>
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
            <li><a href="logout.php">Log out</a></li>
          </ul>
        </nav>
        <?php
        }
        else{
          ?>
          <nav>
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="student_login.php">Student Login</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>
        </nav>
        <div class="user-actions">
          <a href="student_login.php">
            <i class="fas fa-sign-in-alt"></i>
            LOGIN
          </a>
          <!-- <a href="logout.php">
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
      <section>
        <div class="section_img">
          <br /><br /><br />
          <div class="box">
            <br /><br /><br />
            <h1
              style="
                color: white;
                text-align: center;
                font-size: 35px;
                font-weight: bold;
              "
            >
              Welcome to library
            </h1>
            <br />
            <h1
              style="
                color: white;
                text-align: center;
                font-size: 25px;
                font-weight: bold;
              "
            >
              Opens at: 09:00
            </h1>
            <br />
            <h1
              style="
                color: white;
                text-align: center;
                font-size: 25px;
                font-weight: bold;
              "
            >
              Closes at: 15:00
            </h1>
            <br />
          </div>
        </div>
      </section>
      <footer>
        <br />
        <p style="text-align: center">
          Email: library.management@gmail.com<br /><br />
          Mobile: +9471*******
        </p>
      </footer>
    </div>
    <?php 
    include "footer.php";
    ?>
  </body>
</html>
