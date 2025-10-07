<?php
include "connection.php";
include "navbar.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roll = $_POST['roll'];
    $email = $_POST['email'];

    // Check if username already exists
    $stmt = $db->prepare("SELECT COUNT(*) FROM Student WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 0) {
        // Insert new user
        $stmt = $db->prepare("INSERT INTO Student (firstname, lastname, username, password, roll, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $fname, $lname, $username, $password, $roll, $email);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('Registration successful.');</script>";
    } else {
        echo "<script>alert('The username already exists.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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
                    <form method="POST" action="">
                        <div class="Login">
                            <input class="form-control" type="text" name="firstname" placeholder="First Name" required><br><br>
                            <input class="form-control" type="text" name="lastname" placeholder="Last Name" required><br><br>
                            <input class="form-control" type="text" name="username" placeholder="Username" required><br><br>
                            <input class="form-control" type="password" name="password" placeholder="Password" required><br><br>
                            <input class="form-control" type="text" name="roll" placeholder="Roll No" required><br><br>
                            <input class="form-control" type="email" name="email" placeholder="Email" required><br><br>
                            <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px;">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
