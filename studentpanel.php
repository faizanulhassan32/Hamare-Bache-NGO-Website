<?php
session_start();
?>

<html>

    <head>
        <title> Student panel </title>
        <link rel="stylesheet" href="mainpagestyle.css">
    </head>

    <body>
        <div class="bgimg1">
            <form class="form_container">
                <h1> Choose Option </h1>
                <h2>Welcome <?php echo $_SESSION["sid"]?> </h2>
                <button type="submit" class="btn2"> 
                    <a href="viewcourse.php"> View Courses </a> 
                </button>  <br><br>
                
                <button type="submit" class="btn2"> 
                    <a href="course_register.php"> Register Course   </a> 
                </button>
            
            </form>
        </div>
    </body>
</html>