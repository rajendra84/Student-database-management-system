<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>instructor Search</title>
    <link rel="stylesheet" href="student_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>INSTRUCTOR RECORD SERACH  OPERATION</h1></center><br><br><br><br>
<form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <h3>Instructor id</h3><input type="text" name="name" required /><br><br><br>

    <input type="submit" value="SEARCH" name="insert" />
  </form>

  <?php
  if(isset($_POST['insert']))
  {
      $name = $_POST['name'];
      $conn = mysqli_connect("localhost","root","","dbms_project");
      if($conn->connect_error){
        die($conn->connect_error);
      }
      $sqli="SELECT i.instructorid, i.name,d.dname,c.coursename FROM instructor as i join department as d join course as c WHERE i.instructorid=c.instructorid AND i.dno=d.dno AND i.instructorid=".$name.";";
      $result1=$conn->query($sqli);

        if(mysqli_num_rows($result1) > 0){
           echo '<center><h2><table cellpadding="20px" cellspacing="25px" class="db-table"></h2></center>';
  echo '<tr><th style="color:red">Instructor Id</th><th style="color:red">Instructor Name</th><th style="color:red">Department Name</th><th style="color:red">Course name</th></tr>';


     while($row = mysqli_fetch_assoc($result1)){
      echo '<tr>';
      echo '<td>',$row['instructorid'],'</td>';
      echo '<td>',$row['name'],'</td>';
      echo '<td>',$row['dname'],'</td>';
      echo '<td>',$row['coursename'],'</td>';
          echo '</tr>';

    }
 }	else{
    echo"<br><center><h2 style='color:red'>NO DATA</h2></center>";
  }

      $conn->close();
  }
  	?>

   <br>
    <a href="index1.html">GO TO HOME</a>
    </div>
  </body>
</html>
