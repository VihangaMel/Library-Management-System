<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f8fb;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 30px;
            color: #2c3e50;
            font-size: 28px;
        }
        .table {
            border-collapse: collapse;
            margin: 40px auto;
            width: 90%;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .table th, .table td {
            padding: 12px 16px;
            border: 1px solid #e1e1e1;
            text-align: left;
        }
        .table th {
            background: #6db6b9e6;
            color: #fff;
            font-weight: 600;
        }
        .table tr:nth-child(even) {
            background: #f9f9f9;
        }
        .table tr:hover {
            background: #eaf6fb;
        }
        .btn-search {
            background-color: #6db6b9e6;
            color: #fff;
            border: none;
            height: 38px;
            border-radius: 5px;
            cursor: pointer;
            padding: 0 16px;
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;

        }
        .search{
            text-align: right;
            margin-right: 40px;
            margin-top: 20px;
        }
    </style>
</head>
<body >
    <div class="search">
        <form class="navbar-form" method="POST" action="">

                <input type="text" name="search" class="form-control" placeholder="Search students..." required="">
                <button type="submit" name="submit" class="btn-search">
                <i class="fa fa-search"></i>
        </form>
    </div>
    <h2>List of Students</h2>

    <?php
    if(isset($_POST['submit'])){
        $q = mysqli_query($db,"SELECT * FROM student WHERE username LIKE '%$_POST[search]%'");
        if(mysqli_num_rows($q) == 0){
            echo '<br>';
            echo '<br>';
            echo "Sorry! No student found. Try searching again.";
            echo '<br>';
            $res  = mysqli_query($db, "SELECT firstname,lastname,username,roll,email,contact FROM `student`");
    echo "<table class='table table-bordered table-hover' style='width:100%'>";
    echo "<tr>";
    echo "<th>"; echo "First Name"; echo "</th>";
    echo "<th>"; echo "Last Name"; echo "</th>";
    echo "<th>"; echo "Username"; echo "</th>";
    echo "<th>"; echo "Roll"; echo "</th>";
    echo "<th>"; echo "Email"; echo "</th>";
    echo "<th>"; echo "Contact"; echo "</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>"; echo $row['firstname']; echo "</td>";
        echo "<td>"; echo $row['lastname']; echo "</td>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['roll']; echo "</td>";
        echo "<td>"; echo $row['email']; echo "</td>";
        echo "<td>"; echo $row['contact']; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
        }
        else{
            echo "<table class='table table-bordered table-hover' style='width:100%'>";
            echo "<tr>";
            echo "<th>"; echo "First Name"; echo "</th>";
    echo "<th>"; echo "Last Name"; echo "</th>";
    echo "<th>"; echo "Username"; echo "</th>";
    echo "<th>"; echo "Roll"; echo "</th>";
    echo "<th>"; echo "Email"; echo "</th>";
    echo "<th>"; echo "Contact"; echo "</th>";
            echo "</tr>";

            while($row = mysqli_fetch_assoc($q)){
                echo "<tr>";
                echo "<td>"; echo $row['firstname']; echo "</td>";
                echo "<td>"; echo $row['lastname']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['roll']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['contact']; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    else{
        $res  = mysqli_query($db, "SELECT firstname,lastname,username,roll,email,contact FROM `student`");
    echo "<table class='table table-bordered table-hover' style='width:100%'>";
    echo "<tr>";
    echo "<th>"; echo "First Name"; echo "</th>";
    echo "<th>"; echo "Last Name"; echo "</th>";
    echo "<th>"; echo "Username"; echo "</th>";
    echo "<th>"; echo "Roll"; echo "</th>";
    echo "<th>"; echo "Email"; echo "</th>";
    echo "<th>"; echo "Contact"; echo "</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>"; echo $row['firstname']; echo "</td>";
        echo "<td>"; echo $row['lastname']; echo "</td>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['roll']; echo "</td>";
        echo "<td>"; echo $row['email']; echo "</td>";
        echo "<td>"; echo $row['contact']; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    }
    ?>
</body>
</html>