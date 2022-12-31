<html>
    <head>
        <title>
            Delete record
        </title>
        <link rel="stylesheet" href="mainpagestyle.css">
    </head>
<body>
<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->
<?php
        session_start();
        $temp = $_SESSION["id"];
        $found=false;
        $host="localhost";
        $user="root";
        $password="";
        $db="hb";
        $conn = mysqli_connect($host,$user,$password,$db);

        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM student";
        $result = mysqli_query($conn, $sql);
      
        if (mysqli_num_rows($result) > 0) 
        {
          while($row = mysqli_fetch_assoc($result)) {
            if($row['Bform']==$temp)
            {
              $sql="DELETE FROM student where Bform = $temp";
              echo "
              <div class='bgimg1'>
                <form class='infoshow'>
                    <h1> Record Deleted </h1>
                </form>
              </div>
              ";   
              break;
            }
          }
        }    
?>     
<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->

</body>
</html>
