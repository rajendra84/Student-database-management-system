<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Instructor Delete</title>
    <link rel="stylesheet" href="student_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>INSTRUCTOR RECORD DELETE OPERATION</h1></center><br><br><br><br>
<form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <h3>Instructor Name</h3><input type="text" name="name" required /><br><br><br>
    <h3>Course Name</h3><input type="text" name="cname" required /><br><br><br>

    <br><br><br><br>
    <input type="submit" value="DELETE" name="insert" />
  </form>

  <?php
  //	$db_found=mysql_select_db($db);
  if(isset($_POST['insert']))
  {
      $name = $_POST['name'];
      $dnames = $_POST['cname'];


      $conn = mysqli_connect("localhost","root","","dbms_project");
      if($conn->connect_error){
        die($conn->connect_error);
      }
      $sqli="SELECT instructorid FROM instructor natural join course WHERE coursename='".$dnames."' AND name='".$name."';";
      $result1=$conn->query($sqli);
      $row = $result1->fetch_assoc();
      $val = $row['instructorid'];
      $sql ="DELETE FROM course where instructorid=".$val.";";
      $result = $conn->query($sql);
      $sqlii="DELETE FROM instructor where instructorid=".$val.";";
      $result2=$conn->query($sqlii);
      if($result2){
        echo "<center><h2>RECORD DELETED SUCCESSFULLY</h2></center>";
      }
      if(!$result){
        echo"<center><h2>UNSUCCESSFULL: no such instructor exist</h2></center>";
      }
      $conn->close();
  }
  	?>

   <br>
    <a href="index1.html">GO TO HOME</a>
    </div>
  </body>
</html>
