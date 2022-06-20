<?php
require_once 'header.php';
?>

<style>
  body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
  }

  .hero-image {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./img/istockphoto-1252036356-170667a.jpg");
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
    <h5 style="font-size:50px"> ABOUT US</h5>
    <p> Providing quality education.</p>
  </div>
</div>

<!---------------------------------- about us ----------------------------->
<div class="container-fluid">
  <div class="row">
    <div class="mt-3 mx-auto col-lg-10 col-sm-12">
      <h3 style="text-align: left"> About School</h3>
      <p style="text-align: left;"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe libero eius vel asperiores dolorem quo possimus fugiat tenetur blanditiis, animi impedit culpa, architecto excepturi at hic quam tempore aliquam eligendi enim laudantium aperiam? Similique, corrupti blanditiis, dolorum a animi rem sint nemo enim aspernatur atque vero minus unde quos cum consectetur. Facere quo laborum eligendi molestiae dicta quaerat fugit animi. Asperiores, nulla porro. Rerum fuga quisquam aut architecto minima impedit. Ex perspiciatis sint saepe tenetur dolores, eaque quos ipsa, sunt, accusantium tempore molestias! Magnam reiciendis laboriosam ratione? Pariatur autem esse ratione aliquam cum quae voluptatum. Dolore perferendis animi itaque aut. </p>
    </div>
  </div>
</div>


<!---------------------------------- board of directoes----------------------------->
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12 col-lg-12 bg-secondary" style="padding-top: 10px; color: white; border-radius: 15px; margin-bottom: 5px">
      <h5> <i class="fa fa-users"></i> OUR BOARD OF DIRECTORS</h5>
    </div>
  </div>
</div>

<div class="container" style="margin-bottom: 20px;">
  <div class="row">
    <div class="col-lg-3 col-sm-6 mt-1">
      <div class="card body bg-light" >
        <img src="./img/school-building-and-flag-in-lawn-vector-18783818.jpg" class="mx-auto img-fluid" style="width: 100%;">
        <h5 style="font-size: 30px; color: blue"> Annomymous </h5>
        <p style="text-align: left; color: black; font-size: 15px"> CEO, FOUNDER AND PRINCIPAL</p>
      </div>
    </div>
    
    <div class="col-lg-3 col-sm-6 mt-1">
      <div class="card body bg-light" >
        <img src="./img/school-building-and-flag-in-lawn-vector-18783818.jpg" class="mx-auto img-fluid" style="width: 100%;">
        <h5 style="font-size: 30px; color: blue"> Annomymous </h5>
        <p style="text-align: left; color: black; font-size: 15px"> DIRECTOR OF SPORT</p>
      </div>
    </div>
    
    <div class="col-lg-3 col-sm-6 mt-1">
      <div class="card body bg-light" >
        <img src="./img/school-building-and-flag-in-lawn-vector-18783818.jpg" class="mx-auto img-fluid" style="width: 100%;">
        <h5 style="font-size: 30px; color: blue"> Annomymous </h5>
        <p style="text-align: left; color: black; font-size: 15px"> DIRECTOR OF EXAMS AND RECORD </p>
      </div>
    </div>
    
    <div class="col-lg-3 col-sm-6 mt-1">
      <div class="card body bg-light" >
        <img src="./img/school-building-and-flag-in-lawn-vector-18783818.jpg" class="mx-auto img-fluid" style="width: 100%;">
        <h5 style="font-size: 30px; color: blue"> Annomymous </h5>
        <p style="text-align: left; color: black; font-size: 15px"> REGISTRAR </p>
        </p>
      </div>
    </div>

  </div>
</div>


<div class="container">
  <div class="row">
    <div class="mt-5 mx-auto col-lg-4 col-sm-6">
      <h4> OUR VISION & MISSION </h4>
      <li> We are daily driven to deliver top quality education to bring out superb performance and to keep our promise to our dear Parents that with us their kids/wards will exceed expectations.  </li>
      <li> We are proud to deliver top quality education to our learners </li>
      <li> We pursue growth and development through continuous learning </li>
      <li> We are constantly adapting to an ever-changing world </li>
    </div>

    <div class="mt-5 mx-auto col-lg-4 col-sm-6">
      <h3> OUR CORE VALUES </h3>
      <li> Commitment to Excellence </li>
      <li> Pursuit of Growth </li>
      <li> Dedication </li>
      <li> Creativity </li>
      <li> Passion </li>
      <li> Pride </li>
      <li> Integrity and Discipline </li>
      <li> Socially and Environmentally Responsible </li>
    </div>
  </div>
</div>

<!-------------------------------------------- Left and right controls ------------------------------------------------>
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<style>
/*//////////////////////////////////////Slideshow container///////////////////////////////////////////////*/
.slideshow-container {
  position: relative;
  background: #f1f1f1f1;
}

/* Slides */
.mySlides {
  display: none;
  padding: 80px;
  text-align: center;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: cornflowerblue;}
</style>

<h2 style="margin-top: 50px; color: navy; text-align: center">What Parents are saying About Us</h2>
<div class="slideshow-container">
<div class="mySlides">
  <q>Ever since my child, Mike attended King School, his mental thinking capacity have driven so fast that he set's up weekely goal in which he wants to accomplish. Thank you King school for your hardwork and efforts.</q>
  <p class="author">- Chinebere Blessing</p>
</div>

<div class="mySlides">
  <q>I love King School because of their state of the art class rooms and libary. My Son spends more of his free time in the libary studying.</q>
  <p class="author">- Akporo Ernest</p>
</div>

<div class="mySlides">
  <q> King School have not failed in their deligence and committment to ensure the best knowledge for their students. I've just found 100 ways to appreciate them for their hard work.</q>
  <p class="author">- Thomas A. Edison</p>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

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


<footer class="container-fluid text-center bg-dark">
  © 2022 School. All rights reserved. Developed by <a style="text-decoration: none;" href="https://www.instagram.com/king_ibelle/">King_ibelle</a>
</footer>