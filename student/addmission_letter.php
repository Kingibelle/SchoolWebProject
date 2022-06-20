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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../student/asset/css/style.css">
        <link rel="stylesheet" href="../student/asset/css/all.min.css">
        <link rel="stylesheet" href="../student/asset/css/fontawesome.min.css">
        <link rel="stylesheet" href="../student/asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <title>  <?php echo "Welcome, " . $_SESSION['email']; ?> |  Admission Status | School </title>
    </head>

    <div class="container mx-auto">
        <h1 class="text-center text-primary"> SCHOOL</h1>
        <p class="text-dark text-center" style="text-align: left;"> Head office address: No. 2 james agbaja street, Ugbomro, Effurun, Delta state, Nigeria. <br>
            Telephone: 08154021780, 09032322014, 08026416710. 
            <br> Website: www.school.com 
            <br> Email address: support@school.com
        </p>
        <h4 class="text-primary"> OFFICE OF THE REGISTRAR</h4>
    </div> <hr style="border: 2px solid black;">

    <body>

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <?php
                        $currentUser = $_SESSION['email'];
                        $sql = "SELECT * FROM student_reg WHERE email ='$currentUser'";
                        $gotResults = mysqli_query($conn,$sql);
                        if($gotResults){
                            if(mysqli_num_rows($gotResults)>0){
                            while($row = mysqli_fetch_array($gotResults)){
                    ?>
                    <img src="../student/image/<?php echo $row['img']; ?>" name="img" class="img-fluid mx-auto" alt="student image" width="100px;">

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

                    <p style="text-align: left"> Dear, <strong class="text-center text-primary">  <?php echo $row['full_name']; ?>, </strong> </p>

                </div>

            </div>
        </div> <hr style="border: 2px solid black;">

        <div class="container-fluid">
            <div class="container">
                <div class="row">
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
                    <div class="col-lg-12 col-sm-12">
                        <div class="container">
                            <h4 class="text-primary" style="font-size: 20px; text-align: left; font-weight: bold;"> PROVISIONAL LETTER OF ADMISSION INTO SCHOOL</h4>
                        </div> <hr style="border: 2px solid black;">

                        <p style="text-align: left; font-weight: bold"> <i>  <q style="color: purple; text-decoration: none"> I am delighted to inform you,<strong class="text-primary"> <?php echo $row['full_name']; ?>, </strong> that you have been offered provisional admission into SCHOOL to the faculty of </q> <strong style="font-size: 19px;" class="text-primary"> <?php echo $row['faculty']; ?> . </strong> for your desired class into <strong style="font-size: 19px;" class="text-primary"> <?php echo $row['class']; ?> . </strong> </i> The confirmation of your provisional admission is subject to the following conditions: <br>
                            <p style="text-align: left; font-weight: bold;" class="mt-4"> 1. At the point of registration in the school, you will be required to present this printout as evidence of the qualification on which this offer of admission is based. The school reserves the right to withdrawl this admission even after registration if it is discovered that you have been involved in any form of bad activities such as examination malpractice, cultism, robery, theft, fights or any irregularities. </p> <br>
                            <p style="text-align: left; font-weight: bold;"> 2. You are required to present to the school at the time of registration your parents, guardian or a person of reputable standing in the society that can vouch for your character.</p>
                        </p>
                    </div>

                    
                    <div class="col-lg-12 col-sm-12">
                        <h5> <img src="../student/repositry/444-4442230_c-signatures-hd-png-download.png" style="width: 19%;" class="img-fluid"> </h5>
                        <p style="text-align: left;"> <i style="font-weight: bold;"> Akporheigebe King </i>
                            <br> REGISTRAR
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <style>
            footer {
                color: white;
                padding: 15px;
            }
        </style>

        <footer class="container-fluid bg-dark text-center">
            © 2022 School. All rights reserved. Powered by <a style="text-decoration: none; color: red;" href="https://www.instagram.com/king_ibelle/">King_ibelle</a>
        </footer>

    </body>
</html>