<?php
include "connection.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>


    <?php
    if(isset($_POST['submit'])){
        if($sql = mysqli_query($db, "UPDATE admin SET password='$_POST[password]' WHERE  username='$_POST[username]' AND email='$_POST[email]';")){
            ?>
            <script type="text/javascript">
                alert("The Password Updated Successfully.");
            </script>
            <?php
        }
        else{
            ?>
            <script type="text/javascript">
                alert("The Password does not match.");
            </script>
            <?php
        }
    }
    ?>
    
</body>
</html>