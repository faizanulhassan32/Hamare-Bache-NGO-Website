<?php 

if($_POST)
{
    
    $host="localhost";
    $user="root";
    $password="";
    $db="hb";
    $tid=$_POST['sid'];
    $nclass=$_POST['upclass'];
    $conn = mysqli_connect($host,$user,$password,$db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
     
      $sql = "UPDATE student SET class =$nclass  WHERE Bform =$tid ";
      if($result = mysqli_query($conn, $sql))
      echo '<script>alert("Record Updated")</script>';
      else
      echo '<script>alert("Denied")</script>';
    }
   ?>

<html>

    <head>
        <title>Class Assignment Form</title>
        <link rel="stylesheet" href="mainpagestyle.css">
    </head>

    <body>
        <div class="bgimg1">
            <form class="form_container" action="" method="post">
                <h1>Class Assignment Form</h1>
                <input type="number" placeholder="Enter Studen Bform" id="s_id" name="sid" required>
                <br>
                <input type="number" placeholder="Enter Current Class" id="cr_class" name="class" required>
                <br>
                <input type="number" placeholder="Enter New Class" id="new_class" name="upclass" required>
                <br>
                <textarea placeholder= "Reason for change" name="c_reason" id="c_reason" cols="30" rows="10"></textarea> <br><br>
                <button type="submit" class="btn2">Submit</button>

            </form>
        </div>
    </body>
</html>
