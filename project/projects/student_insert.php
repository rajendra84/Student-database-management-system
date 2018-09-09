<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student insert</title>
    <link rel="stylesheet" href="student_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>STUDENT INSERT OPERATION</h1></center><br><br><br><br>
<form method="post" >

    <h3>Scholar number</h3><input type="text" name='scholarno'  required / ><br><br><br>
    <h3>Name</h3><input type="text" name="name" required /><br><br><br>
    <h3>Department Name</h3><input type="text" name="depart" required /><br>
    <br><br><br><br>
    <input type="submit" value="Insert" name="insert" />
  </form>

  <?php
  //	$db_found=mysql_select_db($db);
  if(isset($_POST['insert']))
  {
     $schno= $_POST['scholarno'];
      $name = $_POST['name'];
      $dnames = $_POST['depart'];


      $conn = mysqli_connect("localhost","root","","dbms_project");
      if($conn->connect_error){
        die($conn->connect_error);
      }
      $sqli="SELECT dno FROM department WHERE dname='".$dnames."';";
      $result1=$conn->query($sqli);
      $row = $result1->fetch_assoc();
      $val = $row['dno'];
      $sql ="INSERT INTO student VALUES (".$schno.",'".$name."',".$val.");";
      $result = $conn->query($sql);
      $conn->close();
      if($result){
        echo "<center><h2>RECORD INSERTED SUCCESSFULLY</h2></center>";
      }
      if(!$result){
        echo"<center><h2>UNSUCCESSFULL: wrong department name or scholar number can't repeated</h2></center>";
      }
  }
  	?>

   <br>
    <a href="index1.html">GO TO HOME</a>
    </div>
  </body>
</html>
