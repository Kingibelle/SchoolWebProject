<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/all.min.css">
    <link rel="stylesheet" href="./asset/css/fontawesome.min.css">
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title> SCHOOL </title>
  </head>

  <body>
      <!-- Navigation --> 
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <p> <img class="img-fluid" src="./img/school-building-and-flag-in-lawn-vector-18783818.jpg" style="height: 40px; width: 50px; border-radius: 50%" alt="Hotel logo"> SCHOOL </p>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user-circle"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="./student/studentlogin.php">Student Login Portal</a></li>
                  <li><a class="dropdown-item" href="./student/check_result.php">Check result</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="./admin/admin.php"> Staff </a></li>
                </ul>
                <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact us</a>
                </li>

              </li>
            </ul>
          </div>
        </div>
      </nav>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>