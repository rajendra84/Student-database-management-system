<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>grade insert</title>
    <link rel="stylesheet" href="student_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>GRADE INSERT OPERATION</h1></center><br><br><br><br>
  <form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h3>Grade</h3><input type="text" name="name"  required ><br><br><br>
    <h3>Scholar No.</h3><input type="text" name="sno" required><br><br><br>
    <h3>Course Name</h3><input type="text" name="depart" required><br>
    <br><br><br><br>
    <input type="submit" value="Insert" name="insert" />
    </form>


    <?php
    if(isset($_POST['insert']))
    {
        $names = $_POST['name'];
        $schno = $_POST['sno'];

        $dnames = $_POST['depart'];


        $conn = mysqli_connect("localhost","root","","dbms_project");
        if($conn->connect_error){
          die($conn->connect_error);
        }
        $sqli="SELECT courseno FROM course WHERE coursename='".$dnames."';";
        $result1=$conn->query($sqli);
        $row = $result1->fetch_assoc();
        $val = $row['courseno'];
        $sql ="INSERT INTO grades VALUES (".$schno.",".$val.",'".$names."');";
        $result = $conn->query($sql);
        if($result){
          echo "<center><h2>RECORD INSERTED SUCCESSFULLY</h2></center>";
        }
        if(!$result){
          echo"<center><h2>UNSUCCESSFULL: EITHER YOU ARE TRYING TO INSERT SAME RECORD AGAIN OR STUDENT IS NOT REGSTERED</h2></center>";
        }
        $conn->close();
    }
      ?>
   <br>
    <a href="index1.html">GO TO HOME</a>
    </div>
  </body>
</html>
