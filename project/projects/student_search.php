<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Search</title>
    <link rel="stylesheet" href="student_inserts.css">
  </head>
  <body>
    <div class="wrap">


<center><h1>STUDENT RECORD  SEARCH OPERATION</h1></center><br><br><br><br>
<form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <h3>Scholar Number</h3><input type="text" name="name" required /><br><br><br>

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
      $sqli="SELECT s.scholarno,s.name,d.dname,c.coursename,g.grade  FROM student as s join department as d join grades as g join course as c where s.dno = d.dno AND s.scholarno=g.scholarno  AND g.courseno=c.courseno AND s.scholarno=".$name.";";
      $result1=$conn->query($sqli);

          if(mysqli_num_rows($result1) > 0){
               echo '<center><h2><table cellpadding="20px" cellspacing="25px" class="db-table"></h2></center>';
  		echo '<tr><th style="color:red">Scholar Number</th><th style="color:red">Student Name</th><th style="color:red">Department Name</th><th style="color:red">Course name</th><th style="color:red">Grade</th></tr>';


  		   while($row = mysqli_fetch_assoc($result1)){
  				echo '<tr>';
  				echo '<td>',$row['scholarno'],'</td>';
  				echo '<td>',$row['name'],'</td>';
  				echo '<td>',$row['dname'],'</td>';
          echo '<td>',$row['coursename'],'</td>';
          echo '<td>',$row['grade'],'</td>';
         			echo '</tr>';

  			}
      }	else{
        echo"<br><center><h2 style='color:red'>NO DATA</h2></center>";
      }

      $conn->close();
}
  	?>

   <br>
    <a style="position: absolute" href="index1.html">GO TO HOME</a>
    </div>

  </body>
</html>
