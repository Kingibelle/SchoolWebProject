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
        <link rel="stylesheet" href="./asset/css/style.css">
        <link rel="stylesheet" href="./asset/css/all.min.css">
        <link rel="stylesheet" href="./asset/css/fontawesome.min.css">
        <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>SCHOOL | Student Portal</title>
    </head>
    

    <body>
        <!-- Navigation --> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
                    <p> <img class="img-fluid" src="../img/school-building-and-flag-in-lawn-vector-18783818.jpg" style="height: 40px; width: 50px; border-radius: 50%" alt="Hotel logo"> SCHOOL </p>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../gallery.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../about.php">About us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../student/studentlogin.php">Student Login Portal</a></li>
                            <li><a class="dropdown-item" href="../student/check_result.php">Check result</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../admin/admin.php"> Staff </a></li>
                            </ul>
                            <li class="nav-item">
                            <a class="nav-link" href="../contact.php">Contact us</a>
                            </li>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
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

        <div class="container">
            <div class="mx-auto alert bg-light col-lg-4 col-sm-6 mt-4">
                <a href="../student/studentlogin.php" style="font-size: 20px; text-align: left"> <i class="mb-2 fa fa-arrow-left"> Go Back </i> </a>
                <?php echo "<h2> Welcome, </h2>" . $_SESSION['email']; ?>
                <div class="mt-2" style="font-size: 80px; text-align: center;"> <i class="text-primary fa fa-key"></i>  </div>
                <h3 style="text-align: center; color: blue;"> Change Password</h3> <hr>
                <form method="post" action="#">
                    <div class="form-group">
                        <label> Your previous password is</label>
                        <input disabled selected type="text" class="form-control" name="password" placeholder="Enter your password" value="<?php echo $row['password']; ?>" required />
                    </div>

                    <div class="mt-3 form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required />
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" name="submit" value="UPDATE" class="w-100 btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <?php
            if(isset($_POST['submit'])){
                $password = $_POST['password'];
                $query = "UPDATE student_reg SET password = '$password'
                WHERE email = '$email_input'";
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
        ?>
        <script type="text/javascript">
            alert("Your Password has been changed Successfully.");
            window.location = "../student/studentlogin.php";
        </script>
        <?php
            }              
        ?>
                
        <!------------------------------------ address------------------------>
        <div class="container-fluid" style="background-image: url(../img/eko.jpg); background-repeat: no-repeat; background-size: cover;">
            <div class="row">
                <div class="col-lg-3 col-sm-6 mt-3" style="text-align: left">
                    <h5 id="contact" style="color: white; padding-top: 20px" class="mt-5"> About School</h4>
                    <p style="color: yellow; text-align: left; font-weight: bolder"> We are daily driven to deliver top quality education to bring out superb performance and to keep our promise to our dear Parents that with us their kids/wards will exceed expectations. <br> </p>
                </div>

                <div class="col-lg-3 col-sm-6 mt-3" style="text-align: left">
                    <h5 id="contact" style="color: white; padding-top: 20px" class="mt-5"> Contact Us</h4>
                    <p style="color: yellow; text-align: left; font-weight: bolder"> For Complaints and enquiries you can reach us on any of the numbers below at: <br> </p>           
                    <p style="color: yellow; text-align: left; font-weight: bolder"> <i class="fa fa-phone"></i>  Call us on 0802 641 6710 <br>
                    Mon-Fri, 8:00 am - 5:00 pm</p>
                </div>

                <div class="col-lg-3 col-sm-8 mt-3" style="text-align: left">
                    <h5 id="contact" style="color: white; padding-top: 20px" class="mt-5"> You can visit us at our head office at: </h4>
                    <p style="color: yellow; text-align: left; font-weight: bolder"> <i class="fa fa-map-marker"></i> 2 James Agbaja Street, Ugbomro, Effurun, Warri, Delta state <br>          
                        <i class="fa fa-envelope"></i> school@gmail.com
                    </p>
                </div>

                <div class="col-lg-2 col-sm-4 mt-3" style="text-align: left">
                    <h5 id="contact" style="color: white; padding-top: 20px" class="mt-5"> CONNECT WITH US </h4>
                    <p style="color: yellow; text-align: left; font-weight: bolder"> 
                        <a style="padding: 10px 10px 10px 10px; color: yellow; text-decoration: none;" href="https://www.facebook.com/king_ibelle/"> <i class="fab fa-facebook" style="font-size: 30px;"> </i> </a>
                        <a style="padding: 10px 10px 10px 10px; color: yellow; text-decoration: none;" href="https://www.facebook.com/king_ibelle/"> <i class="fab fa-instagram" style="font-size: 30px;"> </i> </a>
                        <a style="padding: 10px 10px 10px 10px; color: yellow; text-decoration: none;" href="https://www.facebook.com/king_ibelle/"> <i class="fab fa-twitter" style="font-size: 30px;"> </i> </a>
                    </p>                     
                </div>

            </div>
        </div>

        <style>
            footer {
                color: white;
                padding: 15px;
            }
        </style>

        <footer class="container-fluid text-center bg-dark">
            © 2022 School. All rights reserved. Developed by <a style="text-decoration: none;" href="https://www.instagram.com/king_ibelle/">King_ibelle</a>
        </footer>

    </body>
</html>
