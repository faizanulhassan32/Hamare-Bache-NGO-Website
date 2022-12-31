<html>
    <head>
        <title>
            By ID
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
        // $finder=ucfirst($finder);
        $host="localhost";
        $user="root";
        $password="";
        $db="hb";
        $conn = mysqli_connect($host,$user,$password,$db);

        if (!$conn) 
        {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM student WHERE ( Bform='$finder' or FullName = '$finder' ) ";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) 
        {         
          while($row = mysqli_fetch_assoc($result))
          {
            $firstDate = time();
            $secondDate = $row["Age"];
                
            $dateDifference = abs($firstDate - strtotime($secondDate));
                
            $years  = $dateDifference / (365 * 60 * 60 * 24);
            $precision = 1;
            $years=substr(number_format($years, $precision+1, '.', ''), 0, -1);

            $_SESSION['id']=$row["Bform"];

            echo "
            <div class='bgimg1'>
              <form class='infoshow'>
                  <table border=2>
                      <tr>
                          <th>  <h3>  Bform         <td>".$row["Bform"]."</td>        </h3>  </th>
                      </tr>
                          <th>  <h3>  Student Name  <td>".$row["FullName"]."</td>     </h3> </th>
                      </tr>
                          <th>  <h3>  Gender        <td>".$row["Gender"]."</td>       </h3> </th>
                      </tr>
                          <th>  <h3>  Age           <td>".$years."</td>               </h3> </th>
                      </tr>
                          <th>  <h3>  Class         <td>".$row["class"]."</td>        </h3> </th>
                      </tr>
                          <th>  <h3>  Section       <td>".$row["section"]."</td>      </h3> </th>
                      </tr>
                          <th>  <h3>  Father_CNIC   <td>".$row["father_cnic"]."</td>  </h3> </th>
                      </tr>
                          <th>  <h3>  Guardian_CNIC <td>".$row["G_ID"]."</td>         </h3> </th>
                    </tr>
                  </table>
                  <br>
                  <button type='submit' class='btn2'> <a href = 'update.php'> Update record  </a> </button>
                  <br><br>
                  <button type='submit' class='btn2'> <a href = 'delete.php'> Delete record  </a> </button>
              </form>
            </div>
            "; 
        }
            echo "</table>";
        } 
        else
        {
          echo "
          <div class='bgimg1'>
            <form class='infoshow'>
                  <h3> No Record Found </h3>
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
