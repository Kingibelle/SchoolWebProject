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

  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" >
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a href="../student/student.php" class="list-group-item list-group-item-action py-2 ripple " aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i ><span>My dashboard</span>
          </a>

          <a href="../student/update.php" class="list-group-item list-group-item-action py-2 ripple active">
            <i class="fas fa-user-edit fa-fw me-3"></i><span>Update Profile</span>
          </a>

          <a href="../student/update_password.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-lock fa-fw me-3"></i><span>Password</span>
          </a>

          <a href="https://paystack.com/pay/kqti7wbc3h" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-money-bill fa-fw me-3"></i><span>School fees</span>
          </a>

          <a href="../student/index.html" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-video fa-fw me-3"></i><span> Online Class</span>
          </a>

          <a href="../student/addmission_letter.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-receipt fa-fw me-3"></i><span>Admission letter</span>
          </a>

          <a href="../student/check_result.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-book fa-fw me-3"></i><span>Check result</span>
          </a>

          <a href="../student/change_faculty.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-door-open fa-fw me-3"></i><span>Change faculty</span>
          </a>

          <a href="../student/logout.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-power-off fa-fw me-3"></i ><span>Logout</span>
          </a>

        </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand">
          <img src="../student/repositry/school-building-and-flag-in-lawn-vector-18783818.jpg" height="30" alt="school-logo"/>
        </a>

        <h4> Student Portal</h4>

        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Notification dropdown -->
          <li class="nav-item dropdown">

            <!-- Avatar -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user-circle" style="font-size: 28px;"></i>
              </a>

              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="../student/logout.php"> <i class="fas fa-power-off fa-fw me-3"></i> Logout</a></li>
              </ul>

            </li>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container pt-4">

            <div class="container">
                <div class="row">
            
                    <div class="col-lg-6 mx-auto col-sm-6">
                        <div class="card body bg-light" style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px;">

                        
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

                            <h3 style="text-align: center"> Update my Profile</h3>
                            <form method="post" action="#">
                                <div class="mt-4 form-group">
                                    <label>Full name</label>
                                    <input type="text" class="form-control" name="full_name" placeholder="Enter your Fullname" value="<?php echo $row['full_name']; ?>" required />
                                </div>
                                        
                                <div class="mt-4 form-group">
                                    <label>Phone number</label>
                                    <input type="number" class="form-control" name="phone" placeholder="Enter your Phone number" value="<?php echo $row['phone']; ?>" required />
                                </div>

                                <div class="mt-4 form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" placeholder="Enter your Date of Birth" value="<?php echo $row['dob']; ?>" required />
                                </div>

                                <div class="mt-4 form-group">
                                    <label for="sex">Sex</label>
                                    <select class="form-control" name="sex" id="sex">
                                        <option value="" disabledselected>Select your Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="mt-4 form-group">
                                    <label for="religon" class="text-dark">Religon</label>
                                    <select class="form-control mb-3" name="religon" id="religon">
                                        <option value="" selected>Select religion</option>
                                        <option value="Christain">Christain</option>
                                        <option value="Muslim">Muslim</option>
                                    </select>
                                </div>

                                <div class="mt-4 form-group">
                                    <label for="state" class="text-dark">State</label>
                                    <select class="form-control mb-3" name="state" id="state">
                                        <option value="" selected>Select state</option>
                                        <option value="Abia">Abia</option>
                                        <option value="Adamawa">Adamawa</option>
                                        <option value="Akwa Ibom">Akwa Ibom</option>
                                        <option value="Anambra">Anambra</option>
                                        <option value="Bauchi">Bauchi</option>
                                        <option value="Bayelsa">Bayelsa</option>
                                        <option value="Benue">Benue</option>
                                        <option value="Cross River ">Cross River </option>
                                        <option value="Delta">Delta</option>
                                        <option value="Ebonyi">Ebonyi</option>
                                        <option value="Edo">Edo</option>
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Enugu">Enugu</option>
                                        <option value="Gombe">Gombe</option>
                                        <option value="Imo">Imo</option>
                                        <option value="Jigawa">Jigawa</option>
                                        <option value="Kaduna">Kaduna</option>
                                        <option value="Kano">Kano</option>
                                        <option value="Katsina">Katsina</option>
                                        <option value="Kebbi">Kebbi</option>
                                        <option value="Kogi">Kogi</option>
                                        <option value="Kwara">Kwara</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Nasarawa">Nasarawa</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                        <option value="Plateau">Plateau</option>
                                        <option value="Rivers">Rivers</option>
                                        <option value="Sokoto">Sokoto</option>
                                        <option value="Taraba">Taraba</option>
                                        <option value="Yobe">Yobe</option>
                                        <option value="Zamfara">Zamfara</option>
                                    </select>
                                </div>

                                <div class="mt-4 form-group">
                                    <label for="state" class="text-dark"> Local Government Area</label>
                                    <select class="form-control mb-3" name="lga" id="lga">
                                        <option value="" selected>Select Local Government Area</option>
                                        <option value="uvwie">uvwie</option>
                                    </select>
                                </div>

                                <div class="mt-4 form-group">
                                    <input type="submit" name="submit" value="UPDATE" class="w-100 btn btn-primary" >
                                </div>
                            </form>
                            
                            <?php
                                if(isset($_POST['submit'])){
                                    $full_name = $_POST['full_name'];
                                    $phone = $_POST['phone'];
                                    $dob = $_POST['dob'];
                                    $sex = $_POST['sex'];
                                    $religon = $_POST['religon'];
                                    $state = $_POST['state'];
                                    $lga = $_POST['lga'];
                                    $query = "update student_reg set full_name = '$full_name', phone = '$phone', dob = '$dob', sex = '$sex', religon = '$religon', state = '$state', lga = '$lga'
                                    WHERE email = '$email_input'";
                                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                            ?>

                            <script type="text/javascript">
                                alert("Your Profile has been updated Successfully.");
                                window.location = "../student/student.php";
                            </script>
                            <?php
                                }              
                            ?>
              
                        </div>
                    </div>

                </div>
            </div>
      
        </div>
    </main>
  <!--Main layout-->

  <body>

    <style>
        body {
      background-color: #fbfbfb;
    }
    @media (min-width: 991.98px) {
      main {
        padding-left: 240px;
      }
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      padding: 58px 0 0; /* Height of navbar */
      box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
      width: 240px;
      z-index: 600;
    }

    @media (max-width: 991.98px) {
      .sidebar {
        width: 100%;
      }
    }
    .sidebar .active {
      border-radius: 5px;
      box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
    }

    .sidebar-sticky {
      position: relative;
      top: 0;
      height: calc(100vh - 48px);
      padding-top: 0.5rem;
      overflow-x: hidden;
      overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    }
    </style>



    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

    
  </body>
</html>
