<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Student Dashboard</title>
</head>
<body>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="111.jpg" style="width:100%;height:300px"alt="Los Angeles">
    </div>

    <div class="item">
      <img src="222.jpg" alt="Chicago" style="width:100%;height:300px">
    </div>

    <div class="item">
      <img src="333.jpg" alt="New York" style="width:100%;height:300px">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php
session_start();
$a=$_SESSION['v'];
if(isset($_SESSION['v'])==false)
{   
    echo "<script>window.location='studentLogin.php'</script>";
}
echo"$a";
?>



<!-- NAVIGATION BAR -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <!-- <a class="navbar-brand" href="index.php">HOME</a> -->
    </div>
    <ul class="nav navbar-nav">
    <li><a href="company.php">Company</a></li>     
    <li><a href="eligibleCompany.php">Eligible Company</a></li>
    <li><a href="sExam.php">Exam</a></li>
    <li><a href="alumini.php">Alumni</a></li>                         
    <li><a href="report.php">Report</a></li>   
    <li><a href="studentLogout.php">Logout</a></li>
    </ul>
  </div>
</nav>
    <?php
    //    $a=$_GET[ 'a'];
        $con=mysqli_connect('localhost','root','','tnpsys',3307);        
        $q1="select * from sreg where rno='$a'";
        $rs=mysqli_query($con, $q1);
        while($row=mysqli_fetch_array($rs))
        {
            $x=$row['tenthp'];
            $y=$row['twelthp'];
            $z=$row['gp'];
            $q2= "select * from addcompany where tenth<=$x and twelth<=$y and graduation<=$z";
            $rs2=mysqli_query($con, $q2);
            echo"<div class='row'>
            <div class='col-md-1'></div>
            <div class='col-md-10'>          
             <table border=2 class='table'>";
            while($row2=mysqli_fetch_array($rs2))
            {                
                
                 echo"   <tr>
                    <td>$row2[cname]</td>
                    <td><a href='$row2[url]'>Link</a></td>
                    <td>$row2[sProcess]</td>
                    <td>$row2[tenth]</td>
                    <td>$row2[twelth]</td>
                    <td>$row2[graduation]</td>
                    <td>$row2[pg]</td>
                    <td>$row2[backlog]</td>
                    </tr>
               ";

            }
        }  
        echo"</table>
        </div>
               
        <div class='col-md-1'></div>
       </div>";              
    ?>    
</body>
</html>