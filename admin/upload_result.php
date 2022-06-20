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
    $email_input = $_POST['Email'];
  }

  ///////////////////// destroy session and stops if user does not loggin /////////////////////
  if(($_SESSION['Email'])){
  }
  else{
    header("location: ../admin/admin.php");
  }

  /////////////////ERROR VARIABLES///////////////
  $full_nameErr = $classErr = $mathErr = $physicsErr = $chemistryErr = $biologyErr = $englishErr = $termErr = $sessionErr = $remarksErr = "";
   
  //////FORM VARIABLES///////////////////////////////////
  $full_name = $class = $math = $physics = $chemistry = $biology = $english = $term = $session = $remarks = "";
  if(isset($_POST['register'])){      
    $full_name_input = $_POST['full_name'];
    $class_input = $_POST['class'];
    $math_input = $_POST['math'];
    $physics_input = $_POST['physics'];
    $chemistry_input = $_POST['chemistry'];
    $biology_input = $_POST['biology'];
    $english_input = $_POST['english'];
    $term_input = $_POST['term'];
    $session_input = $_POST['session'];
    $remarks_input = $_POST['remarks'];
    
    if(empty($full_name_input)){
      $full_nameErr = "<h6 class='text-danger'> Please enter student name </h6>";
    }else{
      $full_name = sanitize($full_name_input);
    }
    
    if(empty($class_input)){
      $classErr = "<h6 class='text-danger'> Please select class </h6>";
    }else{
      $class = $class_input;
    }

    if(empty($math_input)){
      $mathErr = "<h6 class='text-danger'> Please enter math grade </h6>";
    }else{
      $math = sanitize($math_input);
    }

    if(empty($physics_input)){
      $physicsErr = "<h6 class='text-danger'> Please enter physics grade </h6>";
    }else{
      $physics = sanitize($physics_input);
    }

    if(empty($chemistry_input)){
      $chemistryErr = "<h6 class='text-danger'> Please enter chemistry grade </h6>";
    }else{
      $chemistry = sanitize($chemistry_input);
    }

    if(empty($biology_input)){
      $biologyErr = "<h6 class='text-danger'> Please enetr biology grade </h6>";
    }else{
      $biology = sanitize($biology_input);
    }

    if(empty($english_input)){
      $englishErr = "<h6 class='text-danger'> Please enter english grade </h6>";
    }else{
      $english = sanitize($english_input);
    }

    if(empty($term_input)){
      $termErr = "<h6 class='text-danger'> Please select term </h6>";
    }else{
      $term = $term_input;
    }

    if(empty($session_input)){
      $sessionErr = "<h6 class='text-danger'> Please select session </h6>";
    }else{
      $session = $session_input;
    }

    if(empty($remarks_input)){
      $remarksErr = "<h6 class='text-danger'> Please enter remarks </h6>";
    }else{
      $remarks = sanitize($remarks_input);
    }

    if(empty($full_nameErr) && empty($classErr) && empty($mathErr) && empty($physicsErr) && empty($chemistryErr) && empty($biologyErr) && empty($englishErr) && empty($termErr) && empty($sessionErr) && empty($remarksErr)){
      $sql = "INSERT INTO result VALUES(NULL, '$full_name','$class','$math','$physics','$chemistry','$biology','$english','$term','$session','$remarks')";
      $res = mysqli_query($conn, $sql);
      if(!$res){
        $message = "<span class='text-danger'> Result could not be uploaded! </span>";
      }else{?>
        <script type="text/javascript">
          alert("Result successfully uploaded.");
          window.location = "../admin/upload_result.php";
        </script>
        <?php
      }
    }
  }

  if(isset($_POST['save']) && isset($_GET['update'])){      
    $full_name_input = $_POST['full_name'];
    $class_input = $_POST['class'];
    $math_input = $_POST['math'];
    $physics_input = $_POST['physics'];
    $chemistry_input = $_POST['chemistry'];
    $biology_input = $_POST['biology'];
    $english_input = $_POST['english'];
    $term_input = $_POST['term'];
    $session_input = $_POST['session'];
    $remarks_input = $_POST['remarks'];
       
    if(empty($full_name_input)){
      $full_nameErr = "<h6 class='text-danger'> Please enter student name </h6>";
    }else{
      $full_name = sanitize($full_name_input);
    }
  
    if(empty($class_input)){
      $classErr = "<h6 class='text-danger'> Please select class </h6>";
    }else{
      $class = $class_input;
    }

    if(empty($math_input)){
      $mathErr = "<h6 class='text-danger'> Please enter math grade </h6>";
    }else{
      $math = sanitize($math_input);
    }

    if(empty($physics_input)){
      $physicsErr = "<h6 class='text-danger'> Please enter physics grade </h6>";
    }else{
      $physics = sanitize($physics_input);
    }

    if(empty($chemistry_input)){
      $chemistryErr = "<h6 class='text-danger'> Please enter chemistry grade </h6>";
    }else{
      $chemistry = sanitize($chemistry_input);
    }

    if(empty($biology_input)){
      $biologyErr = "<h6 class='text-danger'> Please enetr biology grade </h6>";
    }else{
      $biology = sanitize($biology_input);
    }

    if(empty($english_input)){
      $englishErr = "<h6 class='text-danger'> Please enter english grade </h6>";
    }else{
      $english = sanitize($english_input);
    }

    if(empty($term_input)){
      $termErr = "<h6 class='text-danger'> Please select term </h6>";
    }else{
      $term = $term_input;
    }

    if(empty($session_input)){
      $sessionErr = "<h6 class='text-danger'> Please select session </h6>";
    }else{
      $session = $session_input;
    }

    if(empty($remarks_input)){
      $remarksErr = "<h6 class='text-danger'> Please enter remarks </h6>";
    }else{
      $remarks = sanitize($remarks_input);
    }

    if(empty($full_nameErr) && empty($classErr) && empty($mathErr) && empty($physicsErr) && empty($chemistryErr) && empty($biologyErr) && empty($englishErr) && empty($termErr) && empty($sessionErr) && empty($remarksErr)){
      $sql = "update result set full_name='$full_name', class='$class', math='$math', physics='$physics', chemistry='$chemistry', biology='$biology', english='$english', term='$term', session='$session', remarks='$remarks' where id='$_GET[update]'";
      $res = mysqli_query($conn, $sql);
      if(!$res){
        $message = "<span class='text-danger'>$full_name, result could not be Updated</span>";
      }else{
        $message = "<span class='text-success'>$full_name, result updated successfully</span>";  
      }
    }
  }

  ///////////////Load data to table below
  $fetchsql = "SELECT * FROM result";
  $fetchRes = mysqli_query($conn, $fetchsql);

  if(isset($_GET['update'])){
    $updateId = $_GET['update'];
    $fetchUpdate = "SELECT * FROM result WHERE id='$updateId'";
    $fetchUpdateResult = mysqli_query($conn, $fetchUpdate);
    $fetchedRowUpdate = mysqli_fetch_assoc($fetchUpdateResult);

    //Create veriables for fetched records
    $full_nameU = $fetchedRowUpdate['full_name'];
    $classU = $fetchedRowUpdate['class'];
    $mathU = $fetchedRowUpdate['math'];
    $physicsU = $fetchedRowUpdate['physics'];
    $chemistryU = $fetchedRowUpdate['chemistry'];
    $biologyU = $fetchedRowUpdate['biology'];
    $englishU = $fetchedRowUpdate['english'];
    $termU = $fetchedRowUpdate['term'];
    $sessionU = $fetchedRowUpdate['session'];
    $remarksU = $fetchedRowUpdate['remarks'];
  }

  if(isset($_GET['delete'])){
    $delId = $_GET['delete'];
    $delSql = "delete from result where id='$delId'";
    $delRes = mysqli_query($conn, $delSql);
    if(!$delRes){
      echo "Record could not be deleted";
    }else{
      header('location: ../admin/upload_result.php?delsuccess = Record Deleted Successfully');
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
          <a href="../admin/admin_profile.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
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

          <a href="../admin/upload_result.php" class="list-group-item list-group-item-action py-2 ripple active">
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
            <h4 style="color: #002939; float: left"> <i style='color: #002939; font-size: 30px;' class='fa fa-book'></i>  List of students result </h4>
            <table class="table table-border table-striped">
              <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Class</th>
                  <th>Math</th>
                  <th>Physics</th>
                  <th>Chemistry</th>
                  <th>Biology</th>
                  <th>English</th>
                  <th>Term</th>
                  <th>Session</th>
                  <th>Remarks</th>
                  <th class="text-center" colspan="2">Action</th>
                </tr>   
              </thead>

              <tbody>
                <?php while($fetchRow = mysqli_fetch_assoc($fetchRes)){?>
                <tr>
                  <td><?php echo $fetchRow['full_name'];  ?></td>
                  <td><?php echo $fetchRow['class'];  ?></td>
                  <td><?php echo $fetchRow['math'];  ?></td>
                  <td><?php echo $fetchRow['physics']; ?></td>
                  <td><?php echo $fetchRow['chemistry'];  ?></td>
                  <td><?php echo $fetchRow['biology'];  ?></td>
                  <td><?php echo $fetchRow['english'];  ?></td>
                  <td><?php echo $fetchRow['term'];  ?></td>
                  <td><?php echo $fetchRow['session'];  ?></td>
                  <td><?php echo $fetchRow['remarks'];  ?></td>
                  <td> <a class="btn btn-warning btn-sm" href="../admin/upload_result.php?update=<?php echo $fetchRow['id']; ?>"> <i class="text-white fa fa-pen fa-sm"></i> </a></td>
                  <td> <a class="btn btn-danger btn-sm" href="../admin/upload_result.php?delete=<?php echo $fetchRow['id']; ?>"> <i class="fa fa-trash fa-sm"></i> </a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <div class="col-lg-2 col-sm-12" style="border: 2px solid black; padding-top: 20px; padding-bottom: 15px">
            <span class="biology"><?php echo $message; ?></span>
            <h5 style="text-align:left; color: blue">Upload results</h5>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
              <span class="text-danger"><?php echo $full_nameErr; ?></span>
              <label for="fullname">Full Name</label>
              <input class="form-control mb-3" placeholder="Enter student name" autocomplete="off" type="text" value="<?php if(isset($_GET['update'])){ echo $full_nameU; }else{echo $full_name;} ?>" name="full_name" id="full_name">

              <span class="text-danger"><?php echo $classErr; ?></span>
              <label for="class">Class</label>
              <select class="form-control mb-3" name="class" id="class">
                <option value="" selected>Select Class</option>
                <option value="jss 1">Jss 1</option>
                <option value="jss 2">Jss 2</option>
                <option value="jss 3">Jss 3</option>
                <option value="sss 1">Sss 1</option>
                <option value="sss 2">Sss 2</option>
                <option value="sss 3">Sss 3</option>
              </select>

              <span class="text-danger"><?php echo $mathErr; ?></span>
              <label for="Math">Math</label>
              <input class="form-control mb-3" placeholder="Enter Math grade" autocomplete="off" type="text" value="<?php if(isset($_GET['update'])){ echo $mathU; }else{echo $math;} ?>" name="math" id="math">

              <span class="text-danger"><?php echo $physicsErr; ?></span>
              <label for="Physics">Physics</label>
              <input class="form-control mb-3" placeholder="Enter Physics grade" autocomplete="off" type="text" value="<?php if(isset($_GET['update'])){ echo $physicsU; }else{echo $physics;} ?>" name="physics" id="physics">

              <span class="text-danger"><?php echo $chemistryErr; ?></span>
              <label for="chemistry">Chemistry</label>
              <input class="form-control mb-3" placeholder="Enter Chemistry grade" autocomplete="off" type="text" value="<?php if(isset($_GET['update'])){ echo $chemistryU; }else{echo $chemistry;} ?>" name="chemistry" id="chemistry">

              <span class="text-danger"><?php echo $biologyErr; ?></span>
              <label for="biology">Biology</label>
              <input class="form-control mb-3" placeholder="Enter Physics grade" autocomplete="off" type="text" value="<?php if(isset($_GET['update'])){ echo $biologyU; }else{echo $biology;} ?>" name="biology" id="biology">

              <span class="text-danger"><?php echo $englishErr; ?></span>
              <label for="english">English</label>
              <input class="form-control mb-3" placeholder="Enter English grade" autocomplete="off" type="text" value="<?php if(isset($_GET['update'])){ echo $englishU; }else{echo $english;} ?>" name="english" id="english">

              <span class="text-danger"><?php echo $termErr; ?></span>
              <label for="term">Term</label>
                <select class="form-control mb-3" name="term" id="term">
                  <option value="" selected>Select Term</option>
                  <option value="First term">First term</option>
                  <option value="Second term">Second term</option>
                  <option value="Third term (Promotional)">Third term (Promotional)</option>
                </select>

                <span class="text-danger"><?php echo $sessionErr; ?></span>
                <label for="session">Session</label>
                <select class="form-control mb-3" name="session" id="session">
                  <option value="" selected>Select Session</option>
                  <option value="2020/2021">2020/2021</option>
                  <option value="2019/2018">2019/2018</option>
                  <option value="2017/2016">2017/2016</option>
                </select>

                <span class="text-danger"><?php echo $remarksErr; ?></span>
                <label for="remarks">Remarks</label>
                <input class="form-control mb-3" placeholder="Enter remarks" autocomplete="off" type="text" value="<?php if(isset($_GET['update'])){ echo $remarksU; }else{echo $remarks;} ?>" name="remarks" id="remarks">

                <?php if(isset($_GET['update'])){ ?>
                <input class="btn btn-warning btn-block text-white mt-3 w-100" style="float:right;" type="submit" name="save" value="Save Changes">
                <?php }else{?>
                  <input class="btn btn-primary btn-block mt-3 w-100" style="float:right;" type="submit" name="register" value="Upload">
                <?php } ?>
              </form>
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


    <script>
        document.getElementById('position').value = "<?php echo $_POST['position'];?>";
        document.getElementById('sex').value = "<?php echo $_POST['sex'];?>";
        document.getElementById('status').value = "<?php echo $_POST['status'];?>";
    </script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

    
  </body>
</html>






