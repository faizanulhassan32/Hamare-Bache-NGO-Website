<?php
session_start();

?>
<html>
    <head>
            <title>
                Register course
            </title>
            <link rel="stylesheet" href="mainpagestyle.css">
        </head>
        <body>
    
    </body>
</html>


<?php
if($_POST)
{
    $section="";
    $host="localhost";
    $user="root";
    $password="";
    $db="hb";
    $cvalue=$_POST['course_options'];
    $id=$_SESSION["sid"];
    
    $conn = mysqli_connect($host,$user,$password,$db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
     
      $sql = "UPDATE student SET C_ID =$cvalue  WHERE Bform =$id ";
      $result = mysqli_query($conn, $sql);

        if($cvalue==100)
        $section="A";
        else if($cvalue==101)
        $section="B";
        else if($cvalue==102)
        $section="C";
        else if($cvalue==103)
        $section="A";
        else if($cvalue==104)
        $section="B";
        else if($cvalue==105)
        $section="C";
        else if($cvalue==106)
        $section="A";
        else if($cvalue==107)
        $section="B";
        else if($cvalue==108)
        $section="C";
        else if($cvalue==109)
        $section="A";
        else if($cvalue==110)
        $section="B";
        else if($cvalue==111)
        $section="C";
        else if($cvalue==112)
        $section="A";
        else if($cvalue==113)
        $section="B";
        else if($cvalue==114)
        $section="C";
        else if($cvalue==115)
        $section="A";
        else if($cvalue==116)
        $section="B";
        else if($cvalue==117)
        $section="C";

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "UPDATE student SET section ='$section'  WHERE Bform =$id ";
        if( mysqli_query($conn, $sql))
        echo"success";
        else
        echo"failed";

            echo '<script>alert(" Course Registered")</script>';   
        exit();
}

    $checker=$_SESSION["sid"];
    $host="localhost";
    $user="root";
    $password="";
    $db="hb";


    $conn=mysqli_connect($host,$user,$password,$db);
    $query="SELECT C_ID FROM student WHERE Bform=$checker";
    $result=mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)==1)
    {
        if($row['C_ID']==0)
        {
            $query="SELECT * FROM course ";
            $result=mysqli_query($conn,$query);
            echo"  
                <div class=bgimg1>
                <form class=form_container action=course_register.php method=post>
                    <h1> Courses </h1>
                    <select name=course_options>
                    <option disabled selected>-- Select Course --</option>
            ";
                    while($row = mysqli_fetch_assoc($result))
                    { 
                        echo "<option value='". $row['C_ID'] ."'>" .$row['course_name'] ."</option>";  // displaying data in option menu
                    }	
                echo"  </select>
                <br><br> <button class=btn2 type=submit value=submit> Submit
                </form>";
        }
        else
        {
            echo '<script>alert("Already Have Course Registered")</script>';
            exit();   
        }
    }
?>