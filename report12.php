<html>
    <head>
        <title>
            Report 12
        </title>
        <link rel="stylesheet" href="mainpagestyle.css">
    </head>
<body>

<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->
<?php

        $host="localhost";
        $user="root";
        $password="";
        $db="hb";
        $conn = mysqli_connect($host,$user,$password,$db);
        if (!$conn) 
        {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "select class, COUNT(*) AS A, Gender, COUNT(*) AS B
                from student
                GROUP BY class, Gender  ";

        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) 
        {         
          while($row = mysqli_fetch_assoc($result))
          {
            echo "
            <div class='bgimg1'>
              <form class='infoshow'>
                  <table border=2 align = center>
                  <tr>
                    <th> <h3> class     </h3>  </th>
                    <th> <h3> Total     </h3> </th>
                    <th> <h3> Gender     </h3> </th>
                    <th> <h3> count of G    </h3> </th>
                  </tr>
                  <td>".$row["class"]."</td>
                  <td>".$row["A"]."</td>
                  <td>".$row["Gender"]."</td>
                  <td>".$row["B"]."</td>
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