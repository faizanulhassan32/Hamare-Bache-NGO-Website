<html>
    <head>
        <title>
            Report 15
        </title>
        <link rel="stylesheet" href="mainpagestyle.css">
    </head>
<body>
<div class="bgimg1">
            <form class="form_container" method="post" >
                <h1>Search Here</h1>
                <input type="text" placeholder="Enter here" name="search">
                <br><br>
                <button type="submit" class="btn2" value="submit"> Submit </button>
            </form>
        </div>

<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->
<?php
    if($_POST)
    {
        session_start();

        $finder=$_POST['search'];

        $host="localhost";
        $user="root";
        $password="";
        $db="hb";
        $conn = mysqli_connect($host,$user,$password,$db);
        if (!$conn) 
        {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = " select b.father_Name, a.FullName , a.class , c.guardian_name
                 from student a, parent b , guardian c
                 where (a.father_cnic = b.father_cnic AND a.G_ID = c.G_ID AND ( a.father_cnic = '$finder' or b.father_Name ='$finder' ) ) ";

        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) 
        {         
          while($row = mysqli_fetch_assoc($result))
          {
            echo "
            <div class='bgimg1'>
              <form class='infoshow'>
                  <table border=2>
                  <tr>
                    <th> <h3> Father name </h3>     </h3> </th>
                    <th> <h3> Children      </h3> </th>
                    <th> <h3> Classes      </h3> </th>
                    <th> <h3> Guardian      </h3> </th>
                  </tr>
                    <td>".$row["father_Name"]."</td>
                    <td>".$row["FullName"]."</td>
                    <td>".$row["class"]."</td>
                    <td>".$row["guardian_name"]."</td>
                  </tr>
                </table>
              </form>
            </div>
            "; 
          }
        }
    }
      
?>     
<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->

</body>
</html>