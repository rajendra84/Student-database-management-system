<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Delete</title>
    <link rel="stylesheet" href="student_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>STUDENT RECORD DELETE OPERATION</h1></center><br><br><br><br>
<form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <h3> Scholar Number</h3><input type="text" name="name" required /><br><br><br>
    <br><br><br><br>
    <input type="submit" value="DELETE" name="insert" />
  </form>

  <?php
  if(isset($_POST['insert']))
  {
      $names = $_POST['name'];


      $conn = mysqli_connect("localhost","root","","dbms_project");
      if($conn->connect_error){
        die($conn->connect_error);
      }
      $sql ="DELETE FROM  student WHERE scholarno=".$names.";";
      $sql1 ="DELETE FROM  grades WHERE scholarno=".$names.";";


      $result1 = $conn->query($sql1);
      $result = $conn->query($sql);
      if($result){
        echo "<center><h2>RECORD DELETED SUCCESSFULLY</h2></center>";
      }
      else{
        echo"<center><h2>UNSUCCESSFULL: scholar number does not exist</h2></center>";
      }
      $conn->close();
  }
  	?>

   <br>
    <a href="index1.html">GO TO HOME</a>
    </div>
  </body>
</html>
