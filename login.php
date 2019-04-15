<?php 
session_start();
include("db.php");
    $name = $_POST['username'];
    $password = $_POST['password'];
        if ($name != "" && $password != "")
        {
            $sql = "select * from user where name like '$name' and password like '$password'";
            $query = mysqli_query($con,$sql);
            $count = mysqli_num_rows($query);
            if($count > 0)
            {
                $row = mysqli_fetch_assoc($query);
                
                $_SESSION['user'] = $row['name'];
                $_SESSION['userId'] = $row['userId'];
                echo 1;
            }
            else 
            {
                echo 0;
            }
        }
        else {
        // echo "<script>alert('Please Fill all the fields!');</script>";
            echo "something went wrong";
        }

?>