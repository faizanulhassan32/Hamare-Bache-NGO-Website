<?php

error_reporting(0);

if($_POST)
{
    session_start();
    $host="localhost";
    $user="root";
    $password="";
    $db="hb";
    $id=$_POST['ID'];
    $pass=$_POST['pass'];

    $conn=mysqli_connect($host,$user,$password,$db);
    $query="SELECT * FROM student WHERE Bform=$id  and student_password='$pass'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
         $_SESSION['sid']=$id;
        header('location:studentpanel.php');
    }
    else
    {
        echo '<script>alert("Incorrect Credentials")</script>';
    }
}
?>






<html>

    <head>
        <title> Login Student </title>
        <link rel="stylesheet" href="mainpagestyle.css">
    </head>

    <body>
        <div class="bgimg1">
            <form class="form_container" method="post" >
                <h1>Student Login</h1>
                <input type="text" placeholder="Enter ID" id="ID" name="ID">
                <br>
                <input type="password" placeholder="Enter Password" id="pass" name="pass">
                <br><br>
                <button type="submit" class="btn2">Submit</button>
            </form>
        </div>
    </body>
</html>