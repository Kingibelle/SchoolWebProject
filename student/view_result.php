<?php
  session_start();

  $email_input = "";
  $emailErr = "";
  $message = "";
  $res = "";

  $server = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'school';
  $conn = mysqli_connect($server, $user, $pass, $db);
  mysqli_select_db($conn, $db);

  if(!$conn){
      echo "Database Not Connected";
  }

  if(isset($_SESSION['btn'])){
    $email_input = $_POST['email'];
  }
  ///////////////////// destroy session and stops if user does not loggin /////////////////////
  if(($_SESSION['email'])){
  }else{
    header("location: ../student/studentlogin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />
        <title>  <?php echo "WELCOME | " . $_SESSION['email']; ?> | Student Portal </title>
    </head>

    <div class="container mx-auto">
        <h1 class="text-center text-primary"> SCHOOL</h1>
        <p class="text-dark text-center"> Head office address: No. 2 james agbaja street, Ugbomro, Effurun, Delta state, Nigeria. <br>
            Telephone: 08154021780, 09032322014, 08026416710. 
            <br> Website: www.school.com 
            <br> Email address: support@school.com
        </p>
        <h4 class="text-primary"> Annual Result Report</h4>
    </div> <hr style="border: 2px solid black;">

    <body>

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <?php
                        $currentUser = $_SESSION['email'];
                        $sql = "SELECT * FROM student_reg WHERE email ='$currentUser'";
                        $gotResults = mysqli_query($conn,$sql);
                        if($gotResults){
                            if(mysqli_num_rows($gotResults)>0){
                            while($row = mysqli_fetch_array($gotResults)){
                    ?>
                    <img src="../student/image/<?php echo $row['img']; ?>" name="img" class="img-fluid mx-auto" alt="student image" width="100px;"> <br>
                    <?php
                                }
                            }
                        }
                    ?>

                    <?php
                        $db = mysqli_connect('localhost', 'root', '') or
                        die ('Unable to connect. Check your connection parameters.');
                        mysqli_select_db($db, 'school' ) or die(mysqli_error($db));
                    ?>

                    <?php
                        $email_input = $_SESSION['email'];
                        $query = mysqli_query($db,"SELECT * FROM student_reg where email='$email_input' ");
                        $row = mysqli_fetch_array($query);
                    ?>
                    <p style="text-align: left;"> Fullname: <br> <strong class="text-dark"> <?php echo $row['full_name']; ?> </strong> </p>
                </div>

                <div class="col-lg-3 col-sm-3">
                    <?php
                        $db = mysqli_connect('localhost', 'root', '') or
                        die ('Unable to connect. Check your connection parameters.');
                        mysqli_select_db($db, 'school' ) or die(mysqli_error($db));
                    ?>

                    <?php
                        $email_input = $_SESSION['email'];
                        $query = mysqli_query($db,"SELECT * FROM student_reg where email='$email_input' ");
                        $row = mysqli_fetch_array($query);
                    ?>
                    <p style="text-align: left;"> Current class: <strong class="text-dark"> <?php echo $row['class']; ?> </strong> </p>
                    <p style="text-align: left;"> Date of birth(Y-M-D): <strong class="text-dark"> <?php echo $row['dob']; ?> </strong> </p>
                </div>

                <div class="col-lg-3 col-sm-3">
                    <?php
                        $db = mysqli_connect('localhost', 'root', '') or
                        die ('Unable to connect. Check your connection parameters.');
                        mysqli_select_db($db, 'school' ) or die(mysqli_error($db));
                    ?>

                    <?php
                        $email_input = $_SESSION['email'];
                        $query = mysqli_query($db,"SELECT * FROM student_reg where email='$email_input' ");
                        $row = mysqli_fetch_array($query);
                    ?>
                    <p style="text-align: left;"> Gender: <strong class="text-dark"> <?php echo $row['sex']; ?> </strong> </p>
                    <p style="text-align: left;"> Email address: <strong class="text-dark"> <?php echo $row['email']; ?> </strong> </p>
                </div>

                <div class="col-lg-3 col-sm-3">
                    <?php
                        $db = mysqli_connect('localhost', 'root', '') or
                        die ('Unable to connect. Check your connection parameters.');
                        mysqli_select_db($db, 'school' ) or die(mysqli_error($db));
                    ?>

                    <?php
                        $email_input = $_SESSION['email'];
                        $query = mysqli_query($db,"SELECT * FROM student_reg where email='$email_input' ");
                        $row = mysqli_fetch_array($query);
                    ?>
                    <p style="text-align: left;"> Faculty: <strong class="text-dark"> <?php echo $row['faculty']; ?> </strong> </p>
                    <p style="text-align: left;"> Phone number: <strong class="text-dark"> <?php echo $row['phone']; ?> </strong> </p>
                </div>


            </div>
        </div>  <hr style="border: 2px solid black;">

        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-sm-12 mx-auto" style="overflow-x:auto;">
                    <?php
                        $class = "";
                        $session = "";

                        if(isset($_POST['check'])){            
                            $class = $_POST["class"];
                            $session = $_POST["session"];
                        }

                        $conn = mysqli_connect("localhost","root","","school");
                        $sql ="select * from result where class = '$class' AND session = '$session'";
                        $runQuery = mysqli_query($conn, $sql);
                        $countRows = mysqli_num_rows($runQuery);

                        if($countRows > 0){
                            echo "<table class='table table-border table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Math</th>";
                                        echo "<th>Physics</th>";
                                        echo "<th>Chemistry</th>";
                                        echo "<th>Biology</th>";
                                        echo "<th>English</th>";
                                        echo "<th>Session</th>";
                                        echo "<th>Remarks</th>";
                                    echo "</tr>";
                                echo "</thead>";

                                while ($row = mysqli_fetch_array($runQuery)){

                                echo "<tbody>";
                                    echo "<tr>";
                                        echo "<td>" . $row['math'] . "</td>";
                                        echo "<td>" . $row['physics'] . "</td>";
                                        echo "<td>" . $row['chemistry'] . "</td>";
                                        echo "<td>" . $row['biology'] . "</td>";
                                        echo "<td>" . $row['english'] . "</td>";
                                        echo "<td>" . $row['session'] . "</td>";
                                        echo "<td>" . $row['remarks'] . "</td>";
                                    echo "</tr>";
                                echo "</tbody>";

                                }
                                echo "</table>  <hr style='border: 2px solid black;'>";
                                echo "KEY TO GRADES: A (Distinction) = 70% & Above, C (Credit) = 55-69%, P (Pass) = 40-54%, F (Fail) = Below 40%<hr style='border: 2px solid black;'>";
                            }            
                            else{
                                echo "<center> <h2 class='text-danger'> Sorry no result found! </h2> <hr style='border: 2px solid black;'> </center>";
                            }
                        ?>
                    </div>

                    <div class="col-lg-12 col-sm-12">
                        <img src="../student/repositry/444-4442230_c-signatures-hd-png-download.png" style="width: 19%;" class="img-fluid">
                        <p style="text-align: left;"> Signed by the Registrar of Exams </p>
                    </div>

                </div>
            </div>
        </div>
                    
        <style>
            footer {
                color: dark;
                padding: 15px;
            }
        </style>

        <footer class="container-fluid bg-dark text-center">
            © 2022 School. All rights reserved. Powered by <a style="text-decoration: none; color: red;" href="https://www.instagram.com/king_ibelle/">King_ibelle</a>
        </footer> 
          
        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

    </body>
</html>


