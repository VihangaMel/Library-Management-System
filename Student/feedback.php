<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style type="text/css">
        body {
            background-image: url("Images/feedback.png");
            background-size: cover;
        }
        .wrapper {
            padding: 10px;
            margin: 20px auto;
            width: 900px;
            height: 600px;
            background-color: rgba(0,0,0,0.8); /* changed for better opacity */
            color: white;
            border-radius: 10px;
        }
        .form-control {
            height: 70px;
            width: 60%;
            border-radius: 5px;
            border: none;
            padding: 10px;
            font-size: 16px;
        }
        .btn {
            background: #6db6b9e6;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .scroll {
            width: 90%;
            height: 300px;
            overflow: auto;
            margin: 20px auto;
            background: rgba(255,255,255,0.9);
            color: #2c3e50;
            border-radius: 8px;
            padding: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #6db6b9e6;
            color: #fff;
        }
        </style>
</head>
<body>
    <div class="wrapper">
        <h4>If you have any suggestions or questions please comment below.</h4>
        <form action="" method="post">
            <input class="form-control" type="text" name="comment" placeholder="Write something..." required><br><br>
            <input class="btn" type="submit" name="submit" value="Comment" style="width: 100px; height: 40px;">
        </form>
        <div class="scroll">
            <?php
            if(isset($_POST['submit'])){
                $comment = mysqli_real_escape_string($db, $_POST['comment']);
                $sql="INSERT INTO `comment` VALUES('','$comment');";
                if(mysqli_query($db,$sql)){
                    echo "<div style='color:green;'>Thanks for your feedback!</div>";
                }
            }
            $q = "SELECT * FROM `comment` ORDER BY `id` DESC";
            $res = mysqli_query($db, $q);
            echo "<table>";
            echo "<tr><th>Comment</th></tr>";
            while($row = mysqli_fetch_assoc($res)){
                echo "<tr>";
                echo "<td>".$row['comment']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </div>
</body>
</html>