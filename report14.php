<html>
    <head>
        <title>
            Report 14
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
        
        $sql = " select distinct a.FullName, p.father_Name , p.mother_Name , g.guardian_name,
                (
                    select b.FullName from student b 
                    where a.father_cnic = b.father_cnic and a.FullName<>b.FullName LIMIT 1
                ) 
                from student a , parent p , guardian g 
                where p.father_cnic = a.father_cnic and a.G_ID = g.G_ID  and ( a.FullName = '$finder' or a.Bform = '$finder') ";

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
                    <th> <h3> student   <td>".$row["FullName"]."</td>  </h3>  </th>
                  </tr>
                    <th> <h3> Father    <td>".$row["father_Name"]."</td>  </h3> </th>
                  </tr>
                    <th> <h3> Mother    <td>".$row["mother_Name"]."</td> </h3> </th>
                  </tr>
                    <th> <h3> Classes   <td>".$row["guardian_name"]."</td> </h3> </th>
                  </tr>
                    <th> <h3> Sibling   <td>".$row["FullName"]."</td> </h3> </th>
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