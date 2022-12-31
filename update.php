<html>
    <head>
        <title>
            Update Info
        </title>
        <link rel="stylesheet" href="mainpagestyle.css">
    </head>
<body>
        <div class="bgimg1">
            <form class="form_container" method="post">
                <h1>Guardian update form</h1>
                <input type="text" placeholder="Enter name" name="gname" required>
                <br>
                <input type="number" placeholder="Enter CNIC" name="gid" required>
                <br>
                <input type="text" placeholder="Enter relation" name="grel" required>
                <br>
                <input type="number" placeholder="Enter phone no" name="gpho" required>
                <br>
                <input type="radio" name="gender" value="male" >male    
                <input type="radio" name="gender" value="female" >female <br> <br>
                
                <button type="submit" class="btn2" value="submit">Submit</button>
            </form>
        </div>

<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->
<?php
    if($_POST)
    {
        session_start();
        $temp = $_SESSION["id"];
        $found=false;
        $host="localhost";
        $user="root";
        $password="";
        $db="hb";
        $conn = mysqli_connect($host,$user,$password,$db);

        $gname=$_POST['gname'];
        $gid=$_POST['gid'];
        $grel=$_POST['grel'];
        $gpho=$_POST['gpho'];
        $ggend=$_POST['gender'];

        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
          $sql = "SELECT * FROM guardian";
          $result = mysqli_query($conn, $sql);
        
          if (mysqli_num_rows($result) > 0) 
          {
            while($row = mysqli_fetch_assoc($result)) {
              if($row['G_ID']==$gid)
              {
              $found=true;
              break;
              }
            }
          } 
          else 
          {
            $found=false;
          }
        
          if ( $found == true )
          {
            $sql="UPDATE student SET G_ID = $gid WHERE Bform = $temp ";
            if(mysqli_query($conn, $sql))
                echo "q1 Inserted"; 
            else
                echo "1 failed";  
          }
          else
          {
            $sql="INSERT INTO guardian (G_ID,guardian_name,guardian_contact,guardian_relation,guardian_gender)
            VALUES ('$gid','$gname', '$gpho', '$grel','$ggend')";
 
            $sql="UPDATE student SET G_ID = $gid WHERE Bform = $temp "; 
          }     
    }
      
?>     
<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->

</body>
</html>
