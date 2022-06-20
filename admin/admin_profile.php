<?php
  session_start();

  $email_input = "";
  $emailErr = "";

  $email = "";
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
    $email_input = $_POST['Email'];
  }
  ///////////////////// destroy session and stops if user does not loggin /////////////////////
  if(($_SESSION['Email'])){
  }
  else{
    header("location: ../admin/admin.php");
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

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <title>  <?php echo "WELCOME | " . $_SESSION['Email']; ?> | Admin Portal </title>
  </head>

  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" >
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a href="../admin/admin_profile.php" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i ><span>My dashboard</span>
          </a>

          <a href="../admin/student_reg.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-user-graduate fa-fw me-3"></i><span> Students</span>
          </a>

          <a href="../admin/staff-registration.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-user-tie fa-fw me-3"></i><span>Staff</span>
          </a>

          <a href="https://dashboard.paystack.com/#/balance?use_cursor=true" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-money-bill fa-fw me-3"></i><span>Payments</span>
          </a>

          <a href="../admin/upload_result.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-book fa-fw me-3"></i><span> Results</span>
          </a>

          <a href="../admin/admin_logout.php" class="list-group-item list-group-item-action py-2 ripple">
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

        <h4> Staff Portal</h4>

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
                            
          <div class="col-lg-4 col-sm-4">
            <div class="card body bg-dark" style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px;">
              <h1 class="mx-auto text-white fas fa-user-graduate" style=" font-size: 40px"></h1>
              <div class="mx-auto"> <a style="text-decoration: none; color: white; font-size: 30px" href="../admin/student_reg.php"> Students </a> </div>
              <?php
                $connection = mysqli_connect("localhost","root","","school");
                $query = "SELECT id FROM student_reg ORDER BY id";
                $query_run = mysqli_query($connection, $query);

                $row = mysqli_num_rows($query_run);

                echo '<h1 class="text-white mx-auto">'.$row.'</h1>';
              ?>
            </div>
          </div>
                            
          <div class="col-lg-4 col-sm-4">
            <div class="card body bg-dark" style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px;">
              <h1 class="mx-auto text-white fas fa-user-tie" style=" font-size: 40px"></h1>
              <div class="mx-auto"> <a style="text-decoration: none; color: white; font-size: 30px" href="../admin/staff-registration.php"> Staffs </a> </div>
              <?php
                $connection = mysqli_connect("localhost","root","","school");
                $query = "SELECT id FROM staff ORDER BY id";
                $query_run = mysqli_query($connection, $query);

                $row = mysqli_num_rows($query_run);

                echo '<h1 class="text-white mx-auto">'.$row.'</h1>';
              ?>
            </div>
          </div>
                            
          <div class="col-lg-4 col-sm-4">
            <div class="card body bg-dark" style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px;">
              <h1 class="mx-auto text-white fas fa-book" style=" font-size: 40px"></h1>
              <div class="mx-auto"> <a style="text-decoration: none; color: white; font-size: 30px" href="../admin/upload_result.php"> Results </a> </div>
              <?php
                $connection = mysqli_connect("localhost","root","","school");
                $query = "SELECT id FROM result ORDER BY id";
                $query_run = mysqli_query($connection, $query);

                $row = mysqli_num_rows($query_run);

                echo '<h1 class="text-white mx-auto">'.$row.'</h1>';
              ?>
            </div>
          </div>
         

        </div>
      </div>

      <!------------------ List of Students -------------------->
      <?php
        /////////////Load data to table below
        $fetchsql = "SELECT * FROM student_reg LIMIT 5";
        $fetchRes = mysqli_query($conn, $fetchsql);
      ?>

      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-12 col-sm-12" style="overflow-x:auto;">
            <a href="../admin/student_reg.php" style="font-size: 20px; text-decoration: none;"> <h5 style="color: blue;"> <i class="fa fa-user-graduate text-left"></i> Students that recently signup for a class <i class="fa fa-arrow-right"></i> </h5> </a> 
            <table class="table table-border table-striped display" id="example">
              <thead>
                <tr>
                  <th>Full name</th>
                  <th>Email address</th>
                  <th>Phone number</th>
                  <th>Class</th>
                  <th>D.O.B</th>
                  <th>Sex</th>
                  <th>Religon</th>
                  <th>State</th>
                  <th>Lga</th>
                  <th>Faculty</th>
                  <th>Image</th>
                </tr>   
              </thead>

              <tbody>
                <?php while($fetchRow = mysqli_fetch_assoc($fetchRes)){?>
                <tr>
                  <td><?php echo $fetchRow['full_name'];  ?></td>
                  <td><?php echo $fetchRow['email']; ?></td>
                  <td><?php echo $fetchRow['phone'];  ?></td>
                  <td><?php echo $fetchRow['class'];  ?></td>
                  <td><?php echo $fetchRow['dob'];  ?></td>
                  <td><?php echo $fetchRow['sex'];  ?></td>
                  <td><?php echo $fetchRow['religon'];  ?></td>
                  <td><?php echo $fetchRow['state'];  ?></td>
                  <td><?php echo $fetchRow['lga'];  ?></td>
                  <td><?php echo $fetchRow['faculty'];  ?></td>
                  <td> <img src="<?php echo "../student/image/".$fetchRow['img']; ?>" class="img-fluid mx-auto" alt="student image" width="70px;"> </td>
                </tr>

                <?php } ?>
              </tbody>
            </table>
                                                                                
            <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
            <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
                                    
            <!------------------ Data tables search, paggination, sort jquery function -------------------->
            <script>
              $(function(){
                $("#example").dataTable();
              })
            </script>

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