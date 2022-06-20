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
            <p> <img class="img-fluid" src="./img/school-building-and-flag-in-lawn-vector-18783818.jpg" style="height: 40px; width: 50px; border-radius: 50%" alt="School logo"> SCHOOL </p>
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
        
      <style>
        body, html {
          height: 100%;
          margin: 0;
          font-family: Arial, Helvetica, sans-serif;
        }

        .heroine-image {
          background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./img/school.jpg");
          height: 70%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          position: relative;
        }

        .hero-text {
          text-align: center;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          color: white;
        }
      </style>

      <div class="heroine-image">
        <div class="hero-text">
          <h3 style="font-size: 40px"> Bringing education to our community </h3>
          <p> — Register your wards/ child with us and ensure success in the future — </p>
          <a href="register.php"> <button class="btn btn-primary"> Register </button> </a>
        </div>
      </div>

      <!---------------------------------------------------Services Section----------------------------------------------------------->
      <div class="container-fluid bg-dark">
        <div class="container text-center text-white bg-dark" style="padding-top: 100px; padding-bottom: 70px;">
          <div class="row">
            <h4 style="text-align: center;"> —Our amenities & services that are designed for your relaxation— </h4>
            <div class="col-lg-3 col-sm-4 mt-3 mb-3">
              <span class="fa fa-flask text-white" style="font-size: 50px"></span>
              <h5> Science Laboratory </h5>
              <p> We have the state of the art science Laboratory, customly built for our students inorder to appreciate science</p>
            </div>

            <div class="col-lg-3 col-sm-4 mt-3 mb-3">
              <span class="fa fa-futbol text-white" style="font-size: 50px"></span>
              <h5> Football feild </h5>
              <p> Our school contains provide a large Football feild for our students who desires football as a sport</p>
            </div>

            <div class="col-lg-3 col-sm-4 mt-3 mb-3">
              <span class="fas fa-water text-white" style="font-size: 50px"></span>
              <h5> Swimming pool </h5>
              <p>The recreation area of our School includes a swimming pool under a glass vault for our students</p>
            </div>

            <div class="col-lg-3 col-sm-4 mt-3 mb-3">
              <span class="fa fa-bus text-white" style="font-size: 50px"></span>
              <h5> School Bus </h5>
              <p> We also provide a large and elegant school bus for our students inorder to keep them in check for class</p>
            </div>

          </div>
        </div>
      </div>
            
      <style>
        body, html {
          height: 100%;
          margin: 0;
          font-family: Arial, Helvetica, sans-serif;
        }

        .heroinen-image {
          background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./img/istockphoto-1323715308-170667a.jpg");
          height: 70%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          position: relative;
        }

        .hero-text {
          text-align: center;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          color: white;
        }
      </style>

      <div class="heroinen-image">
        <div class="hero-text">
          <h3 style="font-size: 40px">Our Gallery </h3>
          <p> — Providing information about our school — </p>
          <a href="gallery.php"> <button class="btn btn-primary"> Get started</button> </a>
        </div>
      </div>
      
      <!----------------------------- meal service --------------------->
      <div class="container-fluid bg-dark">
        <div class="container" style="padding-top: 30px; padding-bottom: 30px;">
          <div class="row">
            <h3 class="text-left text-warning"> Our Students always excel </h3>
            <div class="col-lg-3 col-sm-6 mt-3 mb-3">
              <div class="card body bg-light">
                <img src="./img/eko.jpg" class="mx-auto img-fluid" style="width: 100%;">
                <h4 style="color: blue;"> Johnathan Smith </h4>
                <p> Eight A's and One B in his Senior Secondary School Certificate Examination (SSCE/WAEC) </p>
              </div>
            </div>
              
            <div class="col-lg-3 col-sm-6 mt-3 mb-3">
              <div class="card body bg-light">
                <img src="./img/eko.jpg" class="mx-auto img-fluid" style="width: 100%;">
                <h4 style="color: blue;"> Phebe James </h4>
                <p> Seven A's and Two B's in her Senior Secondary School Certificate Examination (SSCE/WAEC) </p>
              </div>
            </div>
              
            <div class="col-lg-3 col-sm-6 mt-3 mb-3">
              <div class="card body bg-light">
                <img src="./img/eko.jpg" class="mx-auto img-fluid" style="width: 100%;">
                <h4 style="color: blue;"> Howard Paul </h4>
                <p> Six A's and Three B's in his Senior Secondary School Certificate Examination (SSCE/WAEC) </p>
              </div>
            </div>
              
            <div class="col-lg-3 col-sm-6 mt-3 mb-3">
              <div class="card body bg-light">
                <img src="./img/eko.jpg" class="mx-auto img-fluid" style="width: 100%;">
                <h4 style="color: blue;"> Maxwell Okotie </h4>
                <p> Five A's and Four B's in his Senior Secondary School Certificate Examination (SSCE/WAEC) </p>
              </div>
            </div>
          
          </div>
        </div>
      </div>

      <!------------------------------------ address------------------------>
      <div class="container-fluid" style="background-image: url(./img/eko.jpg); background-repeat: no-repeat; background-size: cover;">
        <div class="row">
          <div class="col-lg-3 col-sm-8 mt-3" style="text-align: left">
            <h5 id="contact" style="color: white; padding-top: 20px" class="mt-5"> About SChool </h4>
            <p style="color: yellow; text-align: left; font-weight: bolder"> We are daily driven to deliver top quality education to bring out superb performance and to keep our promise to our dear Parents that with us their kids/wards will exceed expectations. <br> </p>
          </div>

          <div class="col-lg-3 col-sm-4 mt-3" style="text-align: left">
            <h5 id="contact" style="color: white; padding-top: 20px" class="mt-5"> Contact Us</h4>
            <p style="color: yellow; text-align: left; font-weight: bolder"> For Complaints and enquiries you can reach us on any of the numbers below at: <br> </p>
                          
            <p style="color: yellow; text-align: left; font-weight: bolder"> <i class="fa fa-phone"></i>  Call us on 0802 641 6710 <br>
            Mon-Fri, 8:00 am - 5:00 pm</p>
          </div>

          <div class="col-lg-3 col-sm-6 mt-3" style="text-align: left">
            <h5 id="contact" style="color: white; padding-top: 20px" class="mt-5"> You can visit us at our head office at: </h4>
            <p style="color: yellow; text-align: left; font-weight: bolder"> <i class="fa fa-map-marker"></i> 2 James Agbaja Street, Ugbomro, Effurun, Warri, Delta state <br> </p>
                          
            <p style="color: yellow; text-align: left; font-weight: bolder">  <i class="fa fa-envelope"></i> School@gmail.com  <br>
          </div>

          
          <div class="col-lg-2 col-sm-6 mt-3" style="text-align: left">
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

      <script src="./asset/js/jquery-3.5.1.min.js"></script>
      <script src="./asset/js/script.js"></script>

    </body>
  </html>