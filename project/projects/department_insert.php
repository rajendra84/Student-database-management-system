1<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Department Insert</title>
    <link rel="stylesheet" href="student_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>DEPARTMENT RECORD INSERT OPERATION</h1></center><br><br><br><br>
  <form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h3>Department no</h3><input type="text" name="dno"  required ><br><br><br>
    <h3> Deapartment Name</h3><input type="text" name="name" required><br><br><br>
    <h3>Hod Name</h3>

            <input type="text" name="hodname" required/>
<br><br><br>
<input type="submit" value="Insert" name="insert" />
  </form>


  <?php
  if(isset($_POST['insert']))
  {
    $dno=$_POST['dno'];
    $name=$_POST['name'];
    $dnames=$_POST['hodname'];
    $conn = mysqli_connect("localhost","root","","dbms_project");
    if($conn->connect_error){
      die($conn->connect_error);
    }
    $sqli ="INSERT INTO instructor (name) VALUES('".$dnames."');";
    $result1=$conn->query($sqli);

    $sql1="SELECT instructorid from instructor WHERE  name='".$dnames."';";
    $result2=$conn->query($sql1);

    $row = $result2->fetch_assoc();
    $val = $row['instructorid'];
    $sql ="INSERT INTO department VALUES(".$dno.",'".$name."',".$val.");";
    $result = $conn->query($sql);
    $sql2="UPDATE instructor set  dno=".$dno." WHERE instructorid=".$val.";";
    $result3 = $conn->query($sql2);
    if($result3){
      echo "<center><h2>RECORD INSERTED SUCCESSFULLY</h2></center>";
    }
    if(!$result3){
      echo"<center><h2>UNSUCCESSFULL</h2></center>";
    }
    $conn->close();

  }
   ?>
   <br>
    <a href="index1.html">GO TO HOME</a>
    </div>
  </body>
</html>
