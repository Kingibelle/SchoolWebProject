<?php
    require_once "header.php";

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "hotel";

    $conn = mysqli_connect($server, $user, $pass, $db);

    $messages = "";
    $res = "";

    if(!$conn){
        echo "Database failed";
    }
   
    mysqli_select_db($conn, $db);

    $name = $email = $phone = $subject = $message = "";
    $nameErr = $emailErr = $phoneErr = $subjectErr = $messageErr = "";

    if(isset($_POST['send'])){
        $name_input = $_POST['name'];
        $email_input = $_POST['email'];
        $phone_input = $_POST['phone'];
        $subject_input = $_POST['subject'];
        $message_input = $_POST['message'];

        if(empty($name_input)){
            $nameErr = "<h6 style='color: red;'>Please enter your name</h6>";
        }else{
            $name = sanitize($name_input);
        }

        if(empty($email_input)){
            $emailErr = "<h6 style='color: red;'>Please enter your email address</h6>";
        }else{
            $email = sanitize($email_input);
        }
 
        if(empty($phone_input)){
            $phoneErr = "<h6 style='color: red;'>Please enter your phone number</h6>";
        }else{
            $phone = sanitize($phone_input);
        }

        if(empty($subject_input)){
            $subjectErr = "<h6 style='color: red;'>Please enter your subject </h6>";
        }else{
            $subject = sanitize($subject_input);
        }

        if(empty($message_input)){
            $messageErr = "<h6 style='color: red;'>Please enter your message </h6>";
        }else{
            $message = sanitize($message_input);
        }

        if(empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($subjectErr) && empty($messageErr)){
            $sql = "insert into contact values(NULL, '$name','$email','$phone','$subject','$message')";
            $res = mysqli_query($conn, $sql);

            if(!$res){
                $messages = "<div class='alert text-white bg-danger' id='alert'> <i class='fa fa-exclamation-triangle'></i> Your Message could not be completed. Please check the form properly <i class='fa fa-exclamation'></i> </div>";

            }else{?>
                <script>
                    Swal.fire(
                    'Good job!',
                    'Your Message was sent successfully.',
                    'success'
                    )
                </script>
                <?php            
            }
        }
    }
    ///////////////////// trimming data ////////////////////////////////////
    function sanitize($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .heroine-image {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./img/children.jpg");
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
        <h3 style="font-size: 40px"> Get in Touch</h3>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-sm-12" style="padding-top: 20px;">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <?php echo $messages; ?>
                <span><?php echo $nameErr; ?></span>
                <label for="name">Name</label>
                <input type="text" autocomplete="off" name="name" class="mb-3 form-control" placeholder="Enter your name">

                <span><?php echo $emailErr; ?></span>
                <label for="email">Email</label>
                <input type="email" autocomplete="off" name="email" class="mb-3 form-control" placeholder="Enter your email address">

                <span><?php echo $phoneErr; ?></span>
                <label for="phone">Phone</label>
                <input type="number" autocomplete="off" name="phone" class="mb-3 form-control" placeholder="+234 XXX XXXX">

                <span><?php echo $subjectErr; ?></span>                   
                <label for="subject" class="text-dark"> Subject</label>
                <input type="text" name="subject" id="subject" class="mb-3 form-control">
                        
                <span><?php echo $messageErr; ?></span>
                <label for="message" class="text-dark"> Message</label>
                <input type="text" name="message" id="message" class="mb-3 form-control">
                
                <input type="submit" value="SEND" class="w-100 mb-3 btn btn-primary" name="send">
            </form>
        </div>

        <div class="col-lg-4 col-sm-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d35093.85403386901!2d5.780659830727072!3d5.570411771651223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x1041ae642d990335%3A0xb2a58b3674a67eb1!2sUgbomro%20Primary%20School%2C%20330102%2C%20Warri!3m2!1d5.5673539!2d5.8295324!4m5!1s0x1041b03234470647%3A0x28800e52638171d1!2sFederal%20University%20of%20Petroleum%20Resources%20Effurun%2C%20Refinery%20Road%2C%20Warri!3m2!1d5.5657632!2d5.7802953!5e0!3m2!1sen!2sng!4v1644765909122!5m2!1sen!2sng" 
                width="500"
                height="450"
                frameborder="0"
                style="border:0;"
                allowfullscreen=""
                aria-hidden="false"
                tabindex="0"
                allowfullscreen="" 
                loading="lazy"
                >
            </iframe>
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
