<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Deprtment Update</title>
    <link rel="stylesheet" href="instructor_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>DEPARTMENT UPDATE OPERATION</h1></center><br><br><br><br>
  <form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h3>Department Name</h3><input type="text" name="name" required /><br><br><br>
    <h3> New Hod  Id </h3><input type="text" name="depart" required /><br>
    <br><br><br><br>
    <input type="submit" value="UPDATE" name="insert" />
  </form >

  <?php
  	if(isset($_POST['insert']))
  	{
  	    $name = $_POST['name'];
        $dnames = $_POST['depart'];


        $conn = mysqli_connect("localhost","root","","dbms_project");
        if($conn->connect_error){
          die($conn->connect_error);
        }
        $sqli="UPDATE department set hodid=".$dnames." where dname='".$name."';";
        $result1=$conn->query($sqli);
        if($result1){
          echo "<center><h2>RECORD UPDATED SUCCESSFULLY</h2></center>";
        }
        if(!$result1){
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
