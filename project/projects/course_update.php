<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Course Update</title>
    <link rel="stylesheet" href="student_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>COURSE UPDATE OPERATION</h1></center><br><br><br><br>
<form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <h3>Course Name</h3><input type="text" name="name" required /><br><br><br>
    <h3>Instructor Id</h3><input type="text" name="depart" required /><br>
    <br><br><br><br>
    <input type="submit" value="UPDATE" name="insert" />
  </form>

  <?php
  //	$db_found=mysql_select_db($db);
  if(isset($_POST['insert']))
  {
      $name = $_POST['name'];
      $dnames = $_POST['depart'];


      $conn = mysqli_connect("localhost","root","","dbms_project");
      if($conn->connect_error){
        die($conn->connect_error);
      }
      $sqli=" UPDATE course set coursename='".$name."' WHERE instructorid=".$dnames." ;";
      $result1=$conn->query($sqli);
      if($result1){
        echo "<center><h2>SUCCESSFULLY UPDATED</h2></center>";
      }
      else{
        echo"<center><h2>UNSUCCESSFUL:instructor does not exist</h2></center>";
      }
      $conn->close();
  }
  	?>

   <br>
    <a href="index1.html">GO TO HOME</a>
    </div>
  </body>
</html>
