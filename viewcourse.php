<html>
    <head>
        <title>
            View course
        </title>
        <link rel="stylesheet" href="mainpagestyle.css">
    </head>
<body>

<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->
<?php
        session_start();
        $temp = $_SESSION["sid"];
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
        
        $sql = "SELECT * FROM student WHERE Bform=$temp";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) 
        {         
          while($row = mysqli_fetch_assoc($result))
          {
            if ($row["C_ID"] == 0)
            $t = "No registered course";
            else
            $t = $row["C_ID"];
            echo "
            <div class='bgimg1'>
              <form class='infoshow'>
                  <table border=2>
                  <tr>
                    <th> <h3> Student Name </h3>     </h3> </th>
                    <th> <h3> Course ID      </h3> </th>
                  </tr>
                    <td>".$row["FullName"]."</td>
                    <td>".$t."</td>
                  </tr>
                </table>
              </form>
            </div>
            "; 
          }
        }
      
?>     
<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->

</body>
</html>
