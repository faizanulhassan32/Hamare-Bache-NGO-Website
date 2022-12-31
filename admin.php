<?php
if($_POST)
{
    $host="localhost";
    $user="root";
    $password="";
    $db="hb";
    $id=$_POST['ID'];
    $pass=$_POST['pass'];

    $conn=mysqli_connect($host,$user,$password,$db);
    $query="SELECT * FROM admin WHERE ID=$id  and admin_password='$pass'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        // session_start();
        // $_SESSION['auth']='true';
        header('location:adminpanel.html');
    }
    else
    {
        echo '<script>alert("Incorrect Credentials")</script>';
    }

}
?>





<html>

    <head>
        <title> Admin Panel </title>
        <link rel="stylesheet" href="mainpagestyle.css">
    </head>

    <body>
        <div class="bgimg1">
            <form class="form_container" action="admin.php" method="post" >
                <h1>Admin Login</h1>
                <input type="text" placeholder="Enter ID" id="ID" name="ID">
                <br>
                <input type="password" placeholder="Enter Password" id="pass" name="pass">
                <br><br>
                <button type="submit" class="btn2">Submit</button>
            </form>
        </div>
    </body>
</html>