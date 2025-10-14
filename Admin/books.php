<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
        /*body {
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
        }*/
         .search   
        {
            padding-left: 1000px;
        }
        body {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
            }

        .sidenav {
            height: 100%;
            margin-top: 50px;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
                }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
                    }

        .sidenav a:hover {
            color: #f1f1f1;
                        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
                          }

        #main {
            transition: margin-left .5s;
            padding: 16px;
            }

        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
        .img-circle 
        {
            margin-left: 20px;
        }
        .h:hover 
        {
            color: white;
            width: 300px;
            height: 50px;
            background-color: #6db6b9e6;
        }   

    </style>
</head>
<body >
     <!--_________________sidenav___________________________-->
        
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <div style="color: white; margin-left: 80px;"> 

                <?php
                if(isset($_SESSION['login_user']))
                    {
                    echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br>";
                    echo "Welcome ".$_SESSION['login_user'];
                }
                ?>
            </div><br><br>

            <div class="h"> <a href="add.php">Add Books</a> </div>
            <div class="h"> <a href="request.php">Book Request</a> </div>
            <div class="h"> <a href="#">Issue Information </a> </div>
        </div>

        <div id="main">
            
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
        </div>

        <script>
            function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "white";
            }
        </script>

        <!--_________________search bar________________________-->

        <div class="search">
            <form class="navbar-form" method="post" name="form1">
                <div>
                    <input class="form-control" type="text" name="search" placeholder="search books..">
                    <button style="background-color: #6db69e6;" type="submit" name="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>               
                </div>
            </form>

            <!--________________Delete books_____________-->

            <form class="navbar-form" method="post" name="form1">
                <div>
                    <input class="form-control" type="text" name="bid" placeholder="Enter Book ID">
                    <button style="background-color: #6db69e6;" type="submit" name="submit1" class="btn btn-default">Delete
                    </button>               
                </div>
            </form>
        </div>

    <h2>List of Books</h2>

    <?php
    if(isset($_POST['submit'])){
        $q = mysqli_query($db,"SELECT * FROM book WHERE name LIKE '%$_POST[search]%'");
        if(mysqli_num_rows($q) == 0){
            echo '<br>';
            echo '<br>';
            echo "Sorry! No book found. Try searching again.";
            echo '<br>';
            $res  = mysqli_query($db, "SELECT * FROM book;");
    echo "<table class='table table-bordered table-hover' style='width:100%'>";
    echo "<tr>";
    echo "<th>"; echo "ID"; echo "</th>";
    echo "<th>"; echo "Book Name"; echo "</th>";
    echo "<th>"; echo "Authors Name"; echo "</th>";
    echo "<th>"; echo "Edition"; echo "</th>";
    echo "<th>"; echo "Status"; echo "</th>";
    echo "<th>"; echo "Quantity"; echo "</th>";
    echo "<th>"; echo "Department"; echo "</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        echo "<td>"; echo $row['quantity']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
        }
        else{
            echo "<table class='table table-bordered table-hover' style='width:100%'>";
            echo "<tr>";
            echo "<th>"; echo "ID"; echo "</th>";
            echo "<th>"; echo "Book Name"; echo "</th>";
            echo "<th>"; echo "Authors Name"; echo "</th>";
            echo "<th>"; echo "Edition"; echo "</th>";
            echo "<th>"; echo "Status"; echo "</th>";
            echo "<th>"; echo "Quantity"; echo "</th>";
            echo "<th>"; echo "Department"; echo "</th>";
            echo "</tr>";

            while($row = mysqli_fetch_assoc($q)){
                echo "<tr>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['authors']; echo "</td>";
                echo "<td>"; echo $row['edition']; echo "</td>";
                echo "<td>"; echo $row['status']; echo "</td>";
                echo "<td>"; echo $row['quantity']; echo "</td>";
                echo "<td>"; echo $row['department']; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    else{
        $res  = mysqli_query($db, "SELECT * FROM book;");
    echo "<table class='table table-bordered table-hover' style='width:100%'>";
    echo "<tr>";
    echo "<th>"; echo "ID"; echo "</th>";
    echo "<th>"; echo "Book Name"; echo "</th>";
    echo "<th>"; echo "Authors Name"; echo "</th>";
    echo "<th>"; echo "Edition"; echo "</th>";
    echo "<th>"; echo "Status"; echo "</th>";
    echo "<th>"; echo "Quantity"; echo "</th>";
    echo "<th>"; echo "Department"; echo "</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        echo "<td>"; echo $row['quantity']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    }
    ?>
</body>
</html>