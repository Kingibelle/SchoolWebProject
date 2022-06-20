<?php
require_once "header.php";
?>

<style>
  body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
  }

  .hero-image {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./img/photo-1542435503-956c469947f6.jpeg");
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

<div class="hero-image">
  <div class="hero-text">
    <h5 style="font-size:50px"> Our Blog </h5>
    <p> Providing news update and information about our school.</p>
  </div>
</div>

<!---------------------------------- gallery ----------------------------->
<div class="container mt-5 mb-5" style="margin-bottom: 20px;">
    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card body bg-light">
                <img src="./img/istockphoto-1323715308-170667a.jpg" class="mx-auto img-fluid" style="width: 100%;">
                <h6 style="font-size: 20px; color: blue"> First Term 2021/2022 Newsletter </h6>
                <p style="text-align: left;"> The School First term 2021/2022 Academic Session Newsletter is out with informative and exciting content covering all events and academic …</p>
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card body bg-light">
                <img src="./img/istockphoto-1323715308-170667a.jpg  " class="mx-auto img-fluid" style="width: 100%;">
                <h6 style="font-size: 20px; color: blue"> 2020/2021 Graduation and Award Ceremony </h6>
                <p style="text-align: left;"> School had her 4th Graduation and award ceremony on the 30th of July, 2021. It was a fun … </p>
            </div>
        </div>
            
        <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card body bg-light">
                <img src="./img/istockphoto-1323715308-170667a.jpg" class="mx-auto img-fluid" style="width: 100%;">
                <h6 style="font-size: 20px; color: blue"> Summer Lessons </h6>
                <p style="text-align: left;"> Summer class is here again. You can’t afford to miss this fun filled opportunity to prepare your wards for</p>
            </div>
        </div>
            
    </div>
</div>

<!------------------------------------ address------------------------>
<div class="container-fluid" style="background-image: url(./img/eko.jpg); background-repeat: no-repeat; background-size: cover;">
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

<footer class="container-fluid bg-primary text-center">
  © 2022 School. All rights reserved. Powered by <a style="text-decoration: none; color: red;" href="https://www.instagram.com/king_ibelle/">King_ibelle</a>
</footer>