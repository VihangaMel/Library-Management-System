<?php
include "navbar.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!-- Font Awesome CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  </head>
  <body>
    <div class="wrapper">
      <!-- <header>
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

        <div class="user-actions">
          <a href="student_login.php">
            <i class="fas fa-sign-in-alt"></i>
            LOGIN
          </a>
          <a href="">
            <i class="fas fa-sign-out-alt"></i>
            LOGOUT
          </a>
          <a href="registration.php">
            <i class="fas fa-user-plus"></i>
            SIGN UP
          </a>
        </div>
      </header> -->

      <section>
        <div class="stdLogin_img">
          <br /><br />
          <div class="box1">
            <h1
              style="
                text-align: center;
                font-size: 35px;
                font-family: serif;
                color: white;
              "
            >
              Library Management System
            </h1>
            <br />
            <h1 style="text-align: center; font-size: 25px; color: white">
              User Login Form
            </h1>
            <br />
            <form name="Login" action="" method="">
              <br />
              <div class="Login">
                <input
                  class="form-control"
                  type="text"
                  name="username"
                  placeholder="Username"
                  required=""
                /><br /><br />
                <input
                  class="form-control"
                  type="password"
                  name="password"
                  placeholder="Password"
                  required=""
                /><br /><br />
                <input
                  class="btn btn-default"
                  type="submit"
                  name="submit"
                  value="Login"
                  style="color: black; width: 70px; height: 30px"
                />
              </div>

              <p style="color: white; padding-left: 10px">
                <br /><br />
                <a style="color: white" href="">Forgot password?</a> &nbsp &nbsp
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                &nbsp New to this website?
                <a style="color: white" href="registration.html">Sign Up</a>
              </p>
            </form>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>
