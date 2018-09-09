<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Grade Update</title>
    <link rel="stylesheet" href="student_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>GRADES UPDATE OPERATION</h1></center><br><br><br><br>
<form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <h3>Grade</h3><input type="text" name="grade"  required / ><br><br><br>
    <h3> Scholar no.</h3><input type="text" name="name" required /><br><br><br>
    <h3>Course Name</h3><input type="text" name="depart" required /><br>
    <br><br><br><br>
    <input type="submit" value="UPDATE" name="updatess" />

  </form>

  <?php
  //	$db_found=mysql_select_db($db);
  if(isset($_POST['updatess']))
  {
     $schno= $_POST['name'];
      $names = $_POST['grade'];
      $dnames = $_POST['depart'];


      $conn = mysqli_connect("localhost","root","","dbms_project");
      if($conn->connect_error){
        die($conn->connect_error);
      }
      $sqli="SELECT courseno FROM course where coursename='".$dnames."';";
      $result1=$conn->query($sqli);
      $row = $result1->fetch_assoc();
      $val = $row['courseno'];
      $sql ="UPDATE grades set grade='".$names."' where scholarno=".$schno." and courseno=".$val.";";
      $result = $conn->query($sql);
      if($result){
        echo "<center><h2>RECORD UPDATED SUCCESSFULLY</h2></center>";
      }
      if(!$result){
        echo"<center><h2>UNSUCCESSFUL: insert correct values</h2></center>";
      }
      $conn->close();
  }
  	?>

   <br>
    <a href="index1.html">GO TO HOME</a>
    </div>
  </body>
</html>
