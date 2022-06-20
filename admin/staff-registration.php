<?php
    session_start();

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

    /////////////////ERROR VARIABLES///////////////
    $nameErr = $emailError = $phoneErr = $posErr = $sexErr = $staErr = $start_dateErr = "";
   
    //////FORM VARIABLES///////////////////////////////////
    $name = $email = $phone = $position = $sex = $status = $start_date = "";
    if(isset($_POST['register'])){      
        $name_input = mysqli_real_escape_string($conn, $_POST['sname']);
        $email_address_input = mysqli_real_escape_string($conn, $_POST['email']);
        $phone_input = mysqli_real_escape_string($conn, $_POST['phone']);
        $position_input = mysqli_real_escape_string($conn, $_POST['position']);
        $sex_input = mysqli_real_escape_string($conn, $_POST['sex']);
        $status_input = mysqli_real_escape_string($conn, $_POST['status']);
        $start_date_input = mysqli_real_escape_string($conn, $_POST['start_date']);
    
        if(empty($name_input)){
            $nameErr = "<h6 class='text-danger'> Please enter staff name </h6>";
        }else{
            $name = sanitize($name_input);
        }

        /////////////////////// This function checks for duplicate name //////////////////
        $check_duplicate_name_input = "SELECT sname FROM staff WHERE sname = '$name_input' ";
        $result = mysqli_query($conn, $check_duplicate_name_input);
        $count = mysqli_num_rows($result);
        if($count > 0){ ?>
            <script type="text/javascript">
                alert("This name is already taken. Please use another one");
                window.location = "../admin/staff-registration.php"; 
            </script>

            <?php
            return false;
        }
    
        if(empty($email_address_input)){
            $emailError = "<h6 class='text-danger'> Please enter email address </h6>";
        }else{
            $email = sanitize($email_address_input);
        }

        /////////////////////// This function checks for duplicate name //////////////////
        $check_duplicate_email_address_input = "SELECT email FROM staff WHERE email = '$email_address_input' ";
        $result = mysqli_query($conn, $check_duplicate_email_address_input);
        $count = mysqli_num_rows($result);
        if($count > 0){ ?>
            <script type="text/javascript">
                alert("This email address is already taken. Please use another one");
                window.location = "../admin/staff-registration.php"; 
            </script>

            <?php
            return false;
        }

        if(empty($phone_input)){
            $phoneErr = "<h6 class='text-danger'> Please enter phone number </h6>";
        }else{
            $phone = sanitize($phone_input);
        }

        /////////////////////// This function checks for duplicate phone //////////////////
        $check_duplicate_phone_input = "SELECT phone FROM staff WHERE phone = '$phone_input' ";
        $result = mysqli_query($conn, $check_duplicate_phone_input);
        $count = mysqli_num_rows($result);
        if($count > 0){ ?>
            <script type="text/javascript">
                alert("This phone number is already taken. Please use another one");
                window.location = "../admin/staff-registration.php"; 
            </script>

            <?php
            return false;
        }

        if(empty($position_input)){
            $posErr = "<h6 class='text-danger'> Please select position </h6>";
        }else{
            $position = $position_input;
        }

        if(empty($sex_input)){
            $sexErr = "<h6 class='text-danger'> Please select sex </h6>";
        }else{
            $sex = $sex_input;
        }

        if(empty($status_input)){
            $staErr = "<h6 class='text-danger'> Please select status </h6>";
        }else{
            $status = $status_input;
        }

        if(empty($start_date_input)){
            $start_dateErr = "<h6 class='text-danger'> Please enter entry start date </h6>";
        }else{
            $start_date = sanitize($start_date_input);
        }

        if(empty($nameErr) && empty($emailError) && empty($phoneErr) && empty($posErr) && empty($sexErr) && empty($staErr) && empty($start_dateErr)){
            $sql = "INSERT INTO staff VALUES(NULL, '$name_input','$email_address_input','$phone_input','$position_input','$sex_input','$status_input','$start_date_input')";
            $res = mysqli_query($conn, $sql);
            if(!$res){
                $message = "<span class='text-danger'> Staff could not be created </span>";
            }else{?>       
                <script type="text/javascript">
                    alert("Staff registration was successful.");
                    window.location = "../admin/staff-registration.php";
                </script>
                <?php
        
            }
        }
    }

    if(isset($_POST['save']) && isset($_GET['update'])){   
        $name_input = mysqli_real_escape_string($conn, $_POST['sname']);
        $email_address_input = mysqli_real_escape_string($conn, $_POST['email']);
        $phone_input = mysqli_real_escape_string($conn, $_POST['phone']);
        $position_input = mysqli_real_escape_string($conn, $_POST['position']);
        $sex_input = mysqli_real_escape_string($conn, $_POST['sex']);
        $status_input = mysqli_real_escape_string($conn, $_POST['status']);
        $start_date_input = mysqli_real_escape_string($conn, $_POST['start_date']);
    
        if(empty($name_input)){
            $nameErr = "<h6 class='text-danger'> Please enter staff name </h6>";
        }else{
            $name = sanitize($name_input);
        }
      
        if(empty($email_address_input)){
            $emailError = "<h6 class='text-danger'> Please enter email address </h6>";
        }else{
            $email = sanitize($email_address_input);
        }

        if(empty($phone_input)){
            $phoneErr = "<h6 class='text-danger'> Please enter phone number </h6>";
        }else{
            $phone = sanitize($phone_input);
        }

        if(empty($position_input)){
            $posErr = "<h6 class='text-danger'> Please select position </h6>";
        }else{
            $position = $position_input;
        }

        if(empty($sex_input)){
            $sexErr = "<h6 class='text-danger'> Please select sex </h6>";
        }else{
            $sex = $sex_input;
        }

        if(empty($status_input)){
            $staErr = "<h6 class='text-danger'> Please select status </h6>";
        }else{
            $status = $status_input;
        }
        
        if(empty($start_date_input)){
            $start_dateErr = "<h6 class='text-danger'> Please enter entry start date </h6>";
        }else{
            $start_date = sanitize($start_date_input);
        }

        if(empty($nameErr) && empty($passwordErr) && empty($posErr) && empty($phoneErr) && empty($sexErr) && empty($staErr) && empty($start_dateErr)){
            $sql = "UPDATE staff SET sname='$name_input', email='$email_address_input', phone='$phone_input', position='$position_input', sex='$sex_input', status='$status_input', start_date='$start_date_input' WHERE id='$_GET[update]'";
            $res = mysqli_query($conn, $sql);
            if(!$res){
                $message = "<span class='text-danger'>$name, data could not be Updated</span>";
            }else{
                $message = 
                "<script type='text/javascript'>
                    alert('$name, data updated successfully')
                    window.location = '../admin/staff-registration.php';
                </script>";
        
            }
        }
    }

    ///////////////Load data to table below
    $fetchsql = "SELECT * FROM staff";
    $fetchRes = mysqli_query($conn, $fetchsql);

    if(isset($_GET['update'])){
        $updateId = $_GET['update'];
        $fetchUpdate = "SELECT * FROM staff WHERE id='$updateId'";
        $fetchUpdateResult = mysqli_query($conn, $fetchUpdate);
        $fetchedRowUpdate = mysqli_fetch_assoc($fetchUpdateResult);

        //Create veriables for fetched records
        $nameU = $fetchedRowUpdate['sname'];
        $emailU = $fetchedRowUpdate['email'];
        $phoneU = $fetchedRowUpdate['phone'];
        $positionU = $fetchedRowUpdate['position'];
        $sexU = $fetchedRowUpdate['sex'];
        $statusU = $fetchedRowUpdate['status'];
        $start_dateU = $fetchedRowUpdate['start_date'];
    }

    if(isset($_GET['delete'])){
        $delId = $_GET['delete'];

        $delSql = "DELETE FROM staff WHERE id='$delId'";
        $delRes = mysqli_query($conn, $delSql);
        if(!$delRes){
            echo "Record could not be deleted";
        }else{
            header('location: ../admin/staff-registration.php?delsuccess = Record Deleted Successfully');
        }
    }
    
    if(isset($_GET['delsuccess'])){
        $message = $_GET['delsuccess'];
    }
     
   function sanitize($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
          <a href="../admin/admin_profile.php" class="list-group-item list-group-item-action py-2 ripple " aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i ><span>My dashboard</span>
          </a>

          <a href="../admin/student_reg.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-user-graduate fa-fw me-3"></i><span> Students</span>
          </a>

          <a href="../admin/staff-registration.php" class="list-group-item list-group-item-action py-2 ripple active">
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
        
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-10 col-sm-12" style="overflow-x:auto;">
                    <h4 style="color: blue; float: left"> <i style="color: blue; font-size: 30px;" class='fas fa-user-tie'></i>  List of staffs </h4>
                    <table id="example" class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Position</th>
                                <th>Sex</th>
                                <th>Status</th>
                                <th>Start date</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>   
                        </thead>

                        <tbody>
                            <?php while($fetchRow = mysqli_fetch_assoc($fetchRes)){?>
                            <tr>
                                <td><?php echo $fetchRow['sname'];  ?></td>
                                <td><?php echo $fetchRow['email'];  ?></td>
                                <td><?php echo $fetchRow['phone'];  ?></td>
                                <td><?php echo $fetchRow['position']; ?></td>
                                <td><?php echo $fetchRow['sex'];  ?></td>
                                <td><?php echo $fetchRow['status'];  ?></td>
                                <td><?php echo $fetchRow['start_date'];  ?></td>
                                <td> <a class="btn btn-warning btn-sm" href="../admin/staff-registration.php?update=<?php echo $fetchRow['id']; ?>">
                                    <i class="text-white fa fa-pen fa-sm"></i>
                                </a></td>
                                <td> <a class="btn btn-danger btn-sm" href="../admin/staff-registration.php?delete=<?php echo $fetchRow['id']; ?>">
                                    <i class="fa fa-trash fa-sm"></i>
                                </a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>

                <div class="col-lg-2 col-sm-12" style="border: 2px solid black; padding-top: 20px; padding-bottom: 30px">
                    <span class="status"><?php echo $message; ?></span>
                    <h4 style="text-align:left; color: blue">Add Staff</h4>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                    <span class="text-danger"><?php echo $nameErr; ?></span>
                    <label for="Staff Name">Full Name</label>
                    <input class="form-control mb-3" placeholder="Enter staff name" autocomplete="off" type="text" value="<?php if(isset($_GET['update'])){ echo $nameU; }else{echo $name;} ?>" name="sname" id="sname">

                    <span class="text-danger"><?php echo $emailError; ?></span>
                    <label for="Email">Email</label>
                    <input class="form-control mb-3" placeholder="Enter Email address" autocomplete="off" type="email" value="<?php if(isset($_GET['update'])){ echo $emailU; }else{echo $email;} ?>" name="email" id="email">

                    <span class="text-danger"><?php echo $phoneErr; ?></span>
                    <label for="phone number">Phone number</label>
                    <input class="form-control mb-3" placeholder="Enter Phone number" autocomplete="off" type="number" value="<?php if(isset($_GET['update'])){ echo $phoneU; }else{echo $phone;} ?>" name="phone" id="phone">

                    <span class="text-danger"><?php echo $posErr; ?></span>
                    <label for="Position">Position</label>
                    <select class="form-control mb-3" name="position" id="position">
                        <option value="" selected>Select Position</option>
                        <option value="Jss 1 Teacher">Jss 1 Teacher</option>
                        <option value="Jss 2 Teacher">Jss 2 Teacher</option>
                        <option value="Jss 3 Teacher">Jss 3 Teacher</option>
                        <option value="Sss 1 Teacher">Sss 1 Teacher</option>
                        <option value="Sss 2 Teacher">Sss 2 Teacher</option>
                        <option value="Sss 3 Teacher">Sss 3 Teacher</option>
                        <option value="Bursar">Bursar</option>
                        <option value="Sport director">Sport director</option>
                        <option value="Registrar">Registrar</option>
                    </select>

                    <span class="text-danger"><?php echo $sexErr; ?></span>
                    <label for="sex">Sex</label>
                    <select class="form-control mb-3" name="sex" id="sex">
                        <option value="" selected>Select Sex</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    <span class="text-danger"><?php echo $staErr; ?></span>
                    <label for="Marital Status">Marital Status</label>
                    <select class="form-control mb-3" name="status" id="status">
                        <option value="" selected>Select Marital Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                    </select>

                    <span class="text-danger"><?php echo $start_dateErr; ?></span>
                    <label for="Start date">Start date</label>
                    <input class="form-control mb-3" placeholder="Enter entry date" autocomplete="off" type="date" value="<?php if(isset($_GET['update'])){ echo $start_dateU; }else{echo $start_date;} ?>" name="start_date" id="start_date">

                    <?php if(isset($_GET['update'])){ ?>
                    <input class="btn btn-warning btn-block text-white mt-3 w-100" style="float:right;" type="submit" name="save" value="Save changes">
                    <?php }else{?>
                        <input class="btn btn-primary btn-block mt-3 w-100" style="float:right;" type="submit" name="register" value="Register">
                    <?php } ?>
                </form>
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


    <script>
        document.getElementById('position').value = "<?php echo $_POST['position'];?>";
        document.getElementById('sex').value = "<?php echo $_POST['sex'];?>";
        document.getElementById('status').value = "<?php echo $_POST['status'];?>";
    </script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

    
  </body>
</html>






