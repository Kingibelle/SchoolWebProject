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
    <title>  <?php echo "Welcome, " . $_SESSION['email']; ?> | News page | School </title>
  </head>

  <body>   
    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-3 sidenav" style="background-color: #002939;">
          <ul class="mt-5 nav nav-pills nav-stacked">
            <li class="active"><a href="../student/student.php" style="list-style: none; padding: 10px;"> <i class="fa fa-database"></i> My Dashboard </a></li> <hr>
            <li><a class="text-white" href="../student/update.php" style="list-style: none; padding: 10px;"> <i class="fa fa-user-edit"></i> Update Profile</a></li> <hr>
            <li><a class="text-white" href="../student/update_password.php" style="list-style: none; padding: 10px;"> <i class="fa fa-lock"></i> Change Password</a></li> <hr>
            <li><a class="text-white" href="https://paystack.com/pay/kqti7wbc3h" style="list-style: none; padding: 10px;"> <i class="fa fa-money-bill"></i> School-fees</a></li> <hr>
            <li><a class="text-white" href="index.html" style="list-style: none; padding: 10px;"> <i class="fa fa-video"></i> VLE</a></li> <hr>
            <li><a class="text-white" href="../student/addmission_letter.php" style="list-style: none; padding: 10px;"> <i class="fa fa-receipt"></i> Admission-Letter</a></li> <hr>
            <li><a class="text-white" href="../student/news_info.php" style="list-style: none; padding: 10px;"> <i class="fa fa-newspaper"></i> News</a></li> <hr>
            <li ><a class="text-white" href="../student/check_result.php" style="list-style: none; padding: 10px;"> <i class="fa fa-book"></i> Check-results</a></li> <hr>
            <li ><a class="text-white" href="../student/change_faculty.php" style="list-style: none; padding: 10px;"> <i class="fa fa-door-open"></i> Change faculty</a></li> <hr>
            <li><a class="text-danger" href="../student/logout.php" style="list-style: none; padding: 10px;"> <i class="fa fa-power-off"></i> Logout</a></li> <hr>
          </ul><br>
        </div>

        <div class="col-sm-9">
          <div class="container" style="padding-bottom: 200px">
            <div class="row">        

              <div class="container mt-3" style="padding-bottom: 10px">
                <div class="row">
                  <div class="col-12">
                    <div class="alert text-white" style="background-color: #002939;"> <a href="../student/student.php" style="text-align: left; font-size: 20px; text-decoration: none; color: white"> My Dashboard </a> > News Page</div>
                  </div>
                </div>
              </div>

              <section style="border-radius: 5px">
                <h2 id="Ght"> SECTION</h2>
                <a href="#1" style="text-decoration: none; padding: 14px 16px">chapter 1</a>
                <a href="#2" style="text-decoration: none; padding: 14px 16px">chapter 2</a>
                <a href="#3" style="text-decoration: none; padding: 14px 16px">chapter 3</a>
                <a href="#4" style="text-decoration: none; padding: 14px 16px">chapter 4</a>
              </section>

              <article>
                <h3 id="1" style="float: left">chapter 1</h3> <a href="#Ght" style="float: right; text-decoration: none; color: white">go to the head topic;</a> <br> <hr>
                <h4 style="text-align: left; color: white"> Steps On How to Check result online</h4> <br>
                <p style="text-align: left;">After logging into your portal, <br> 1. Click on "Check result", for Mobile-smartphones it is at the top of your portal, but for laptops and computers, its located at the side of your portal. <br> 2. Then you shall be directed to the check-result page. <br> 3. The check-result page would appear and it shall be displaying your result. <br> 4. Endevour to print it out for verification and future use.</p>
              </article>

              <article>
                <h3 id="2" style="float: left">chapter 2</h3> <a href="#Ght" style="float: right; text-decoration: none; color: white">go to the head topic;</a> <br> <hr>
                <h4 style="text-align: left; color: white"> Steps On How to Make Payment for School fees</h4> <br>
                <p style="text-align: left;">After logging into your portal, <br> 1. Click on "School fees", for Mobile-smartphones it is at the top of your portal, but for laptops and computers, its located at the side of your portal. <br> 2. Then you shall be directed to our payment page that is powered by Paystack. The School fees charge is NGN100,000.00 and its is printed on the input feild. Fill in the form correctly with your details and click on the "Pay" button. <br> 3. A payment method would appear, You can select either USSD, CARD OR INTERNET BANK. <br> 4. After selecting which method you prefare, filling in the following input with your credentials. <br> 5. You shall receive a Notification on your screen displaying 'Your Payment has been successfully Accomplished!' <br> 6. Endevour to print it out for verification and future use.</p>
              </article>

              <article>
                <h3 id="3" style="float: left">chapter 3</h3> <a href="#Ght" style="float: right; text-decoration: none; color: white">go to the head topic;</a> <br> <hr>
                <h4 style="text-align: left; color: white"> Steps On How to Change faculty</h4> <br>
                <p style="text-align: left;">After logging into your portal, <br> 1. Click on "Change faculty", for Mobile-smartphones it is at the top of your portal, but for laptops and computers, its located at the side of your portal. <br> 2. Then you shall be directed to the change of faculty page. You shall see your previous faculty printed out<br> 3. Select the new faculty you desire to change/ switch to and click the "UPDATE" button. <br> 4. You shall receive a Notification on your screen displaying 'You have Successfully change your faculty'.</p>
              </article>

              <article>
                <h3 id="4" style="float: left">chapter 4</h3> <a href="#Ght" style="float: right; text-decoration: none; color: white">go to the head topic;</a> <br> <hr>
                <h4 style="text-align: left; color: white"> Steps On How to View Admission status</h4> <br>
                <p style="text-align: left;">After logging into your portal, <br> 1. Click on "Admission Letter", for Mobile-smartphones it is at the top of your portal, but for laptops and computers, its located at the side of your portal. <br> 2. Then you shall be directed to the Admission letter page. You will see your Admission letter<br> 3. Endevour to print it out for verification and future use.
              </article>
                                            
              <style>
                article{
                  max-width: 700PX;
                  margin:auto;
                  background-color: grey;
                  color:white;
                  padding:20px;
                  margin-top:20px;
                }

                section{
                  max-width:700px;
                  margin:auto;
                  background-color: black;
                  padding:20px;
                  margin-top:20px;
                  color: white;
                }

                a{
                  color:white;
                }
              </style>

              <style>
                body {
                  font-family: Arial, Helvetica, sans-serif;
                  margin: 0;
                }

                html {
                  box-sizing: border-box;
                }

                *, *:before, *:after {
                  box-sizing: inherit;
                }

                .button {
                  border: none;
                  outline: 0;
                  display: inline-block;
                  padding: 8px;
                  color: white;
                  background-color: #000;
                  text-align: center;
                  cursor: pointer;
                  width: 100%;
                }

                .button:hover {
                  background-color: #555;
                }

                @media screen and (max-width: 650px) {
                  .column {
                    width: 100%;
                    display: block;
                  }
                }
              </style>

            </div>
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
