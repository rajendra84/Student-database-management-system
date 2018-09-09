<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>course insert</title>
    <link rel="stylesheet" href="student_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>COURSE INSERT OPERATION</h1></center><br><br><br><br>
  <form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h3>Course No </h3><input type="text" name="no"  required /><br><br><br>
    <h3>Instructor Name</h3><input type="text" name="ins" required/><br><br><br>
    <h3>Course Name</h3><input type="text" name="depart" required/><br>
    <br><br><br><br>
    <input type="submit" value="Insert" name="insert" />
    </form>


    <?php
    //	$db_found=mysql_select_db($db);
    if(isset($_POST['insert']))
    {
       $schno= $_POST['no'];
        $names = $_POST['ins'];
        $dnames = $_POST['depart'];


        $conn = mysqli_connect("localhost","root","","dbms_project");
        if($conn->connect_error){
          die($conn->connect_error);
        }
        $sqli="SELECT instructorid FROM instructor WHERE name='".$names."';";
        $result1=$conn->query($sqli);
        $row = $result1->fetch_assoc();
        $val = $row['instructorid'];
        $sql ="INSERT INTO course VALUES ('".$dnames."',".$schno.",".$val.");";
        $result = $conn->query($sql);
        if($result){
          echo "<center><h2>RECORD INSERTED SUCCESSFULLY</h2></center>";
        }
        if(!$result){
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
