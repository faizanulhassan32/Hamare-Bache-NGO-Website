<html>
    <head>
        <title>Student Accompnying Form</title>
        <link rel="stylesheet" href="mainpagestyle.css">
    </head>

    <body>
        <div class="bgimg1" >
            <form class="form_container" action="" method="post" >
                <h1>Student Accompnying Form</h1>
                <input type="number" placeholder="Enter Studen Bform" id="s_id" name="s_id" required>
                <br>
                <input type="text" placeholder="Enter Student Name" id="s_name" name="s_name" required>
                <br>
                <input type="number" placeholder="Enter Class" id="s_class" name="s_class" required>
                <br>
                <input type="number" placeholder="Enter Guardian ID" id="g_id" name="g_id" required>
                <br>
                <input type="text" placeholder="Enter Guardian name" id="g_name" name="g_name" required>
                <br>
                <input type="radio" name="preg" value="pregnant" >Pregnant
                <input type="radio" name="preg" value="not pregnant" >Not pregnant<br> <br>
                <textarea placeholder= "Enter your reason" name="reason" id="reason" cols="30" rows="10"></textarea> <br><br>
                <button type="submit" class="btn2" value="submit">Submit</button>
            </form>
        </div>
    
<?php 

if($_POST)
{
    $host="localhost";
    $user="root";
    $password="";
    $db="hb";

    $gname=$_POST['g_name'];
    $gid=$_POST['g_id'];
    $mstat=$_POST['preg'];
    $stud=$_POST['s_id'];

    $conn = mysqli_connect($host,$user,$password,$db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
     
      $sql="INSERT INTO acompany_guardian (AID,gname,mother_status,Bform)
      VALUES ($gid, $gname,$mstat,$stud)";
      if(mysqli_query($conn, $sql))
      echo '<script>alert("Record Inserted")</script>';
      else
      echo '<script>alert("Denied")</script>';
    }
 ?>
        
    </body>
</html>