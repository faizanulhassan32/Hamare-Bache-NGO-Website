<?php
if($_POST)
{
    $found=false;
    $host="localhost";
    $user="root";
    $password="";
    $db="hb";
    $conn = mysqli_connect($host,$user,$password,$db);


$sname=$_POST['sname'];
$sid=$_POST['sid'];
$sdob=$_POST['sdob'];
$spass=$_POST['spass'];
$sgender=$_POST['gender'];

$fname=$_POST['fname'];
$fid=$_POST['fid'];
$fadres=$_POST['fadres'];
$fpho=$_POST['fpho'];
$femail=$_POST['femail'];


$mname=$_POST['mname'];
$mid=$_POST['mid'];
$madres=$_POST['madres'];
$mpho=$_POST['mpho'];
$memail=$_POST['memail'];


$gname=$_POST['gname'];
$gid=$_POST['gid'];
$grel=$_POST['grel'];
$gpho=$_POST['gpho'];
$ggend=$_POST['gender'];




if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT father_cnic FROM parent";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) 
  {

    while($row = mysqli_fetch_assoc($result)) {
      if($row['father_cnic']==$fid)
      {
      $found=true;
      break;
      }
    }
  } else {
    $found=false;
  }

  $sql1="INSERT INTO guardian (G_ID,guardian_name,guardian_contact,guardian_relation,guardian_gender)
  VALUES ('$gid','$gname', '$gpho', '$grel','$ggend')";
  if(mysqli_query($conn, $sql1))
  echo"Guardian Inserted";
  else
  echo"failed here";






$sql="INSERT INTO student (FullName,Bform,father_cnic,Gender,Age,student_password)
VALUES ('$sname', '$sid', '$fid','$sgender','$sdob','$spass')";
  if(mysqli_query($conn, $sql))
  echo"Student Inserted";




 if(!$found)
 {
$sql= "INSERT INTO parent (father_cnic,father_name,father_contact,father_email,father_address,mother_cnic,mother_name,mother_contact,mother_email,mother_address)
  VALUES ('$fid','$fname', '$fpho', '$femail','$fadres','$mid','$mname', '$mpho', '$memail','$madres')";
  if (mysqli_query($conn, $sql))
  echo "parents worked";
 }

  

   
}






?>