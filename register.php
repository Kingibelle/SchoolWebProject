<?php
    session_start();

    require_once "header.php";

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "school";

    $conn = mysqli_connect($server, $user, $pass, $db);

    $message = "";

    $res = "";

    $_SESSION['status'] = "";

    if(!$conn){
        echo "Database failed";
    }

    mysqli_select_db($conn, $db);

    //////////////////////// ERROR VARIABLES ////////////////////
    $fullnameErr = $emailErr = $phoneErr = $classErr = $dobErr = $sexErr = $religonErr = $stateErr = $lgaErr = $facultyErr = $imageErr = $passwordErr = "";
   
    //////////////////// FORM VARIABLES ///////////////////////////////////
    $fullname = $email = $phone = $class = $dob = $sex = $religon = $state = $lga = $faculty = $image = $password = "";

    if(isset($_POST['reg'])){
        $fullname_input = mysqli_real_escape_string($conn, $_POST['full_name']);
        $email_input = mysqli_real_escape_string($conn, $_POST['email']);
        $phone_input = mysqli_real_escape_string($conn, $_POST['phone']);
        $class_input = mysqli_real_escape_string($conn, $_POST['class']);
        $dob_input = mysqli_real_escape_string($conn, $_POST['dob']);
        $sex_input = mysqli_real_escape_string($conn, $_POST['sex']);
        $religon_input = mysqli_real_escape_string($conn, $_POST['religon']);
        $state_input = mysqli_real_escape_string($conn, $_POST['state']);
        $lga_input = mysqli_real_escape_string($conn, $_POST['lga']);
        $faculty_input = mysqli_real_escape_string($conn, $_POST['faculty']);
        $image_input = mysqli_real_escape_string($conn, $_FILES['img']['name']);
        $password_input = mysqli_real_escape_string($conn, $_POST['password']);

        if(empty($fullname_input)){
            $fullnameErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please enter full name </h6>";
        }else{
            $fullname = sanitize($fullname_input);
        }

        /////////////////////// This function checks for duplicate name //////////////////
        $check_duplicate_fullname = "SELECT full_name FROM student_reg WHERE full_name = '$fullname_input' ";
        $result = mysqli_query($conn, $check_duplicate_fullname);
        $count = mysqli_num_rows($result);
        if($count > 0){ ?>
            <script type="text/javascript">
                alert("This name is already taken. Please use another one");
                window.location = "register.php"; 
            </script>

            <?php
            return false;
        }

        if(empty($email_input)){
            $emailErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please enter an email address </h6>";
        }else{
            $email = sanitize($email_input);
        }
        ////////////////////// This function checks for duplicate email //////////////////
        $check_duplicate_email = "SELECT email FROM student_reg WHERE email = '$email_input' ";
        $result = mysqli_query($conn, $check_duplicate_email);
        $count = mysqli_num_rows($result);
        if($count > 0){ ?>
            <script type="text/javascript">
                alert("This email address is already taken. Please use another one");
                window.location = "register.php"; 
            </script>

            <?php
            return false;
        }

        if(empty($phone_input)){
            $phoneErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please enter a phone number </h6>";
        }else{
            $phone = sanitize($phone_input);
        }
        ////////////////////// This function checks for duplicate phone number //////////////////
        $check_duplicate_phone = "SELECT phone FROM student_reg WHERE phone = '$phone_input' ";
        $result = mysqli_query($conn, $check_duplicate_phone);
        $count = mysqli_num_rows($result);
        if($count > 0){ ?>
            <script type="text/javascript">
                alert("This phone number is already taken. Please use another one");
                window.location = "register.php"; 
            </script>

            <?php
            return false;
        }

        if(empty($class_input)){
            $classErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please select a class </h6>";
        }else{
            $class = $class_input;
        }

        if(empty($dob_input)){
          $dobErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please enter a date of birth </h6>";
        }else{
            $dob = sanitize($dob_input);
        }

        if(empty($sex_input)){
            $sexErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please select sex </h6>";
        }else{
            $sex = $sex_input;
        }

        if(empty($religon_input)){
            $religonErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please select religon </h6>";
        }else{
            $religon = $religon_input;
        }

        if(empty($state_input)){
            $stateErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please select state </h6>";
        }else{
            $state = $state_input;
        }

        if(empty($lga_input)){
            $lgaErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please select local government </h6>";
        }else{
            $lga = $lga_input;
        }

        if(empty($faculty_input)){
          $facultyErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please select a faculty </h6>";
        }else{
          $faculty = $faculty_input;
        }

        if(empty($image_input)){
            $imageErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please select a image </h6> ";
        }else {
            $image = sanitize($image_input);
        }
        ///////////////////// This function checks for duplicate images //////////////////
        $check_duplicate_image = "SELECT img FROM student_reg WHERE img = '$image_input' ";
        $result = mysqli_query($conn, $check_duplicate_image);
        $count = mysqli_num_rows($result);
        if($count > 0){?>
            <script type="text/javascript">
                alert("This image is already taken. Please use another");
                window.location = "register.php"; 
            </script>

            <?php
            return false;
        }

        $allowed_exttension = array('gif','png','jpg','jpeg');
        $filename = $_FILES['img']['name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($file_extension, $allowed_exttension)){
            $_SESSION['status'] = "<h6 class='text-warning'> <i class='fa fa-exclamation-circle'> </i> You can only input image files with jpg, png, jpeg and gif </h6>";
        }else{
            if(file_exists("./student/image/" . $_FILES['img']['name'])) {
                $filename = $_FILES['img']['name'];
                $_SESSION['status'] = "Image already exist ".$filename;
            }
        }

        if(empty($password_input)){
            $passwordErr = "<h6 class='text-danger'> <i class='fa fa-exclamation-circle'> </i> Please enter a password </h6>";
        }else{
            $password = sanitize($password_input);
        }

        if(empty($fullnameErr) && empty($emailErr) && empty($phoneErr) && empty($classErr) && empty($dobErr) && empty($sexErr) && empty($religonErr) && empty($stateErr) && empty($lgaErr) && empty($facultyErr) && empty($imageErr) && empty($passwordErr)){
            $sql = "INSERT INTO student_reg VALUES(NULL, '$fullname_input','$email_input','$phone_input','$class_input','$dob_input','$sex_input','$religon_input','$state_input','$lga_input','$faculty_input','$image','$image_input')";
            $res = mysqli_query($conn, $sql);
 
            if($res){
                move_uploaded_file($_FILES['img']['tmp_name'], "./student/image/".$_FILES['img']['name']);
            }

            if(!$res){
                $message = "<div style='font-size: 20px; text-align: center;' class='alert bg-danger text-white'> Your data could not be sumbitted</div>";
            }else{?>

                <!--------- sweet alert ------->
                <script>
                    swal({
                        title: "Good job!",
                        text: "You have successfully signup for a class!",
                        icon: "success",
                    });
                </script>


                <!-----  <script type="text/javascript">
                    alert("You have successfully signup for a class");
                    window.location = "./student/studentlogin.php"; 
                </script> ----------->
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

<body>
    <div class="container mt-4" style="padding-bottom: 10px">
        <div class="row">
            <div class="alert bg-light col-lg-5 col-sm-8 mx-auto" id="alert">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                    <?php echo $message; ?>
                    <div class="mt-1" style="font-size: 50px; text-align: center;"> <i class="text-primary fa fa-users"></i>  </div>
                    <h4 class="reg text-primary mb-2" style="text-align: center"> Registration for a class</h4> <hr>
                    <span><?php echo $fullnameErr; ?></span>
                    <label for="full_name" class="text-dark">Fullname</label>
                    <input type="text" autocomplete="off" name="full_name" class="form-control mb-3" placeholder="Full Name" pattern="('/^[a-zA-Z- ]+$/' " title="Must not contain a string or integer">

                    <span><?php echo $emailErr; ?></span>
                    <label for="email" class="text-dark">Email</label>
                    <input type="email" autocomplete="off" name="email" class="form-control mb-3" placeholder="Email address">
                        
                    <span><?php echo $phoneErr; ?></span>
                    <label for="phone" class="text-dark">Phone</label>
                    <input type="number" autocomplete="off" name="phone" class="form-control mb-3" placeholder="+234 XXX XXXX">

                    <span><?php echo $classErr; ?></span>
                    <label for="class" class="text-dark">Class</label>
                    <select class="form-control mb-3" name="class" id="class">
                        <option value="" selected>Select Class</option>
                        <option value="jss 1"> Jss 1</option>
                        <option value="jss 2"> Jss 2</option>
                        <option value="jss 3"> Jss 3</option>
                        <option value="sss 1"> Sss 1</option>
                        <option value="sss 2"> Sss 2</option>
                        <option value="sss 3"> Sss 3</option>
                    </select>

                    <span><?php echo $dobErr; ?></span>
                    <label for="dob" class="text-dark">Date Of Birth</label>
                    <input type="date" name="dob" class="form-control mb-3">

                    <span><?php echo $sexErr; ?></span>
                    <label for="sex" class="text-dark">Sex</label>
                    <select class="form-control mb-3" name="sex" id="sex">
                        <option value="" selected>Select Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                        
                    <span class="text-danger"><?php echo $religonErr; ?></span>
                    <label for="religon" class="text-dark">Religon</label>
                    <select class="form-control mb-3" name="religon" id="religon">
                        <option value="" selected>Select religion</option>
                        <option value="Christain">Christain</option>
                        <option value="Muslim">Muslim</option>
                    </select>

                    <span class="text-danger"><?php echo $stateErr; ?></span>
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

                    <span class="text-danger"><?php echo $lgaErr; ?></span>
                    <label for="state" class="text-dark"> Local Government Area</label>
                    <select class="form-control mb-3" name="lga" id="lga">
                        <option value="" selected>Select Local Government Area</option>
                        <option value="Abadam">Abadam</option>
                        <option value="Abaji">Abaji</option>
                        <option value="Abak">Abak</option>
                        <option value="Abakaliki">Abakaliki</option>
                        <option value="Aba North">Aba North</option>
                        <option value="Aba South">Aba South</option>
                        <option value="Abeokuta North">Abeokuta North</option>
                        <option value="Abeokuta South">Abeokuta South</option>
                        <option value="Abi">Abi</option>
                        <option value="Aboh Mbaise">Aboh Mbaise</option>
                        <option value="Abua/Odual">Abua/Odual</option>
                        <option value="Abuja Municipal Area Council">Abuja Municipal Area Council</option>
                        <option value="Adavi">Adavi</option>
                        <option value="Ado Ekiti">Ado Ekiti</option>
                        <option value="Ado-Odo/Ota">Ado-Odo/Ota</option>
                        <option value="Afijio">Afijio</option>
                        <option value="Afikpo North">Afikpo North</option>
                        <option value="Afikpo South (Edda)">Afikpo South (Edda)</option>
                        <option value="Agaie">Agaie</option>
                        <option value="Agatu">Agatu</option>
                        <option value="Agwara">Agwara</option>
                        <option value="Agege">Agege</option>
                        <option value="Aguata">Aguata</option>
                        <option value="Ahiazu Mbaise">Ahiazu Mbaise</option>
                        <option value="Ahoada East">Ahoada East</option>
                        <option value="Ahoada West">Ahoada West</option>
                        <option value="Ajaokuta">Ajaokuta</option>
                        <option value="Ajeromi-Ifelodun">Ajeromi-Ifelodun</option>
                        <option value="Ajingi">Ajingi</option>
                        <option value="Akamkpa">Akamkpa</option>
                        <option value="Akinyele">Akinyele</option>
                        <option value="Akko">Akko</option>
                        <option value="Akoko-Edo">Akoko-Edo</option>
                        <option value="Akoko North-East">Akoko North-East</option>
                        <option value="Akoko North-West">Akoko North-West</option>
                        <option value="Akoko South-West">Akoko South-West</option>
                        <option value="Akoko South-East">Akoko South-East</option>
                        <option value="Akpabuyo">Akpabuyo</option>
                        <option value="Akuku-Toru">Akuku-Toru</option>
                        <option value="Akure North">Akure North</option>
                        <option value="Akure South">Akure South</option>
                        <option value="Akwanga">Akwanga</option>
                        <option value="Albasu">Albasu</option>
                        <option value="Aleiro">Aleiro</option>
                        <option value="Alimosho">Alimosho</option>
                        <option value="Alkaleri">Alkaleri</option>
                        <option value="Amuwo-Odofin">Amuwo-Odofin</option>
                        <option value="Anambra East">Anambra East</option>
                        <option value="Anambra West">Anambra West</option>
                        <option value="Anaocha">Anaocha</option>
                        <option value="Andoni">Andoni</option>
                        <option value="Aninri">Aninri</option>
                        <option value="Aniocha North">Aniocha North</option>
                        <option value="Aniocha South">Aniocha South</option>
                        <option value="Anka">Anka</option>
                        <option value="Ankpa">Ankpa</option>
                        <option value="Apa">Apa</option>
                        <option value="Apapa">Apapa</option>
                        <option value="Ado">Ado</option>
                        <option value="Ardo Kola">Ardo Kola</option>
                        <option value="Arewa Dandi">Arewa Dandi</option>
                        <option value="Argungu">Argungu</option>
                        <option value="Arochukwu">Arochukwu</option>
                        <option value="Asa">Asa</option>
                        <option value="Asari-Toru">Asari-Toru</option>
                        <option value="Askira/Uba">Askira/Uba</option>
                        <option value="Atakunmosa East">Atakunmosa East</option>
                        <option value="Atakunmosa West">Atakunmosa West</option>
                        <option value="Atiba">Atiba</option>
                        <option value="Atisbo">Atisbo</option>
                        <option value="Augie">Augie</option>
                        <option value="Auyo">Auyo</option>
                        <option value="Awe">Awe</option>
                        <option value="Awgu">Awgu</option>
                        <option value="Awka North">Awka North</option>
                        <option value="Awka South">Awka South</option>
                        <option value="Ayamelum">Ayamelum</option>
                        <option value="Aiyedaade">Aiyedaade</option>
                        <option value="Aiyedire">Aiyedire</option>
                        <option value="Babura">Babura</option>
                        <option value="Badagry">Badagry</option>
                        <option value="Bagudo">Bagudo</option>
                        <option value="Bagwai">Bagwai</option>
                        <option value="Bakassi">Bakassi</option>
                        <option value="Bokkos">Bokkos</option>
                        <option value="Bakori">Bakori</option>
                        <option value="Bakura">Bakura</option>
                        <option value="Balanga">Balanga</option>
                        <option value="Bali">Bali</option>
                        <option value="Bama">Bama</option>
                        <option value="Bade">Bade</option>
                        <option value="Barkin Ladi">Barkin Ladi</option>
                        <option value="Baruten">Baruten</option>
                        <option value="Bassa">Bassa</option>
                        <option value="Batagarawa">Batagarawa</option>
                        <option value="Batsari">Batsari</option>
                        <option value="Bauchi">Bauchi</option>
                        <option value="Baure">Baure</option>
                        <option value="Bayo">Bayo</option>
                        <option value="Bebeji">Bebeji</option>
                        <option value="Bekwarra">Bekwarra</option>
                        <option value="Bende">Bende</option>
                        <option value="Biase">Biase</option>
                        <option value="Bichi">Bichi</option>
                        <option value="Bida">Bida</option>
                        <option value="Billiri">Billiri</option>
                        <option value="Bindawa">Bindawa</option>
                        <option value="Binji">Binji</option>
                        <option value="Biriniwa">Biriniwa</option>
                        <option value="Birnin Gwari">Birnin Gwari</option>
                        <option value="Birnin Kebbi">Birnin Kebbi</option>
                        <option value="Birnin Kudu">Birnin Kudu</option>
                        <option value="Birnin Magaji/Kiyaw">Birnin Magaji/Kiyaw</option>
                        <option value="Biu">Biu</option>
                        <option value="Bodinga">Bodinga</option>
                        <option value="Bogoro">Bogoro</option>
                        <option value="Boki">Boki</option>
                        <option value="Boluwaduro">Boluwaduro</option>
                        <option value="Bomadi">Bomadi</option>
                        <option value="Bonny">Bonny</option>
                        <option value="Borgu">Borgu</option>
                        <option value="Boripe">Boripe</option>
                        <option value="Bursari">Bursari</option>
                        <option value="Bosso">Bosso</option>
                        <option value="Brass">Brass</option>
                        <option value="Buji">Buji</option>
                        <option value="Bukkuyum">Bukkuyum</option>
                        <option value="Buruku">Buruku</option>
                        <option value="Bungudu">Bungudu</option>
                        <option value="Bunkure">Bunkure</option>
                        <option value="Bunza">Bunza</option>
                        <option value="Burutu">Burutu</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Calabar Municipal">Calabar Municipal</option>
                        <option value="Calabar South">Calabar South</option>
                        <option value="Chanchaga">Chanchaga</option>
                        <option value="Charanchi">Charanchi</option>
                        <option value="Chibok">Chibok</option>
                        <option value="Chikun">Chikun</option>



                        remaining d,e,f,g,h,i,j,k,l,o
                        all a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z

                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>
                        <option value="Chafe">Chafe</option>



                        <option value="Mani">Mani</option>
                        <option value="Maradun">Maradun</option>
                        <option value="Mariga">Mariga</option>
                        <option value="Makurdi">Makurdi</option>
                        <option value="Marte">Marte</option>
                        <option value="Maru">Maru</option>
                        <option value="Mashegu">Mashegu</option>
                        <option value="Mashi">Mashi</option>
                        <option value="Matazu">Matazu</option>
                        <option value="Mayo Belwa">Mayo Belwa</option>
                        <option value="Mbaitoli">Mbaitoli</option>
                        <option value="Mbo">Mbo</option>
                        <option value="Michika">Michika</option>
                        <option value="Miga">Miga</option>
                        <option value="Mikang">Mikang</option>
                        <option value="Minjibir">Minjibir</option>
                        <option value="Misau">Misau</option>
                        <option value="Moba">Moba</option>
                        <option value="Mobbar">Mobbar</option>
                        <option value="Mubi North">Mubi North</option>
                        <option value="Mubi South">Mubi South</option>
                        <option value="Mokwa">Mokwa</option>
                        <option value="Monguno">Monguno</option>
                        <option value="Mopa Muro">Mopa Muro</option>
                        <option value="Moro">Moro</option>
                        <option value="Moya">Moya</option>
                        <option value="Mkpat-Enin">Mkpat-Enin</option>
                        <option value="Musawa">Musawa</option>
                        <option value="Mushin">Mushin</option>
                        <option value="Nafada">Nafada</option>
                        <option value="Nangere">Nangere</option>
                        <option value="Nasarawa">Nasarawa</option>
                        <option value="Nasarawa Egon">Nasarawa Egon</option>
                        <option value="Ndokwa East">Ndokwa East</option>
                        <option value="Ndokwa West">Ndokwa West</option>
                        <option value="Nembe">Nembe</option>
                        <option value="Ngala">Ngala</option>
                        <option value="Nganzai">Nganzai</option>
                        <option value="Ngaski">Ngaski</option>
                        <option value="Ngor Okpala">Ngor Okpala</option>
                        <option value="Nguru">Nguru</option>
                        <option value="Ningi">Ningi</option>
                        <option value="Njaba">Njaba</option>
                        <option value="Njikoka">Njikoka</option>
                        <option value="Nkanu East">Nkanu East</option>
                        <option value="Nkanu West">Nkanu West</option>
                        <option value="Nkwerre">Nkwerre</option>
                        <option value="Nnewi North">Nnewi North</option>
                        <option value="Nnewi South">Nnewi South</option>
                        <option value="Nsit-Atai">Nsit-Atai</option>
                        <option value="Nsit-Ibom">Nsit-Ibom</option>
                        <option value="Nsit-Ubium">Nsit-Ubium</option>
                        <option value="Nsukka">Nsukka</option>
                        <option value="Numan">Numan</option>
                        <option value="Nwangele">Nwangele</option>




                        <option value="Musawa">Musawa</option>
                        <option value="Musawa">Musawa</option>
                        <option value="Musawa">Musawa</option>
                        <option value="Musawa">Musawa</option>
                        <option value="Musawa">Musawa</option>











                        <option value="Paikoro">Paikoro</option>
                        <option value="Pankshin">Pankshin</option>
                        <option value="Patani">Patani</option>
                        <option value="Pategi">Pategi</option>
                        <option value="Port Harcourt">Port Harcourt</option>
                        <option value="Potiskum">Potiskum</option>
                        <option value="Qua'an Pan">Qua'an Pan</option>
                        <option value="Rabah">Rabah</option>
                        <option value="Rafi">Rafi</option>
                        <option value="Rano">Rano</option>
                        <option value="Remo North">Remo North</option>
                        <option value="Rijau">Rijau</option>
                        <option value="Rimi">Rimi</option>
                        <option value="Rimin Gado">Rimin Gado</option>
                        <option value="Ringim">Ringim</option>
                        <option value="Riyom">Riyom</option>
                        <option value="Rogo">Rogo</option>
                        <option value="Roni">Roni</option>
                        <option value="Sabon Birni">Sabon Birni</option>
                        <option value="Sabon Gari">Sabon Gari</option>
                        <option value="Sabuwa">Sabuwa</option>
                        <option value="Safana">Safana</option>
                        <option value="Sagbama">Sagbama</option>
                        <option value="Sakaba">Sakaba</option>
                        <option value="Saki East">Saki East</option>
                        <option value="Saki West">Saki West</option>
                        <option value="Sandamu">Sandamu</option>
                        <option value="Sanga">Sanga</option>
                        <option value="Sapele">Sapele</option>
                        <option value="Sardauna">Sardauna</option>
                        <option value="Shagamu">Shagamu</option>
                        <option value="Shagari">Shagari</option>
                        <option value="Shanga">Shanga</option>
                        <option value="Shani">Shani</option>
                        <option value="Shanono">Shanono</option>
                        <option value="Shelleng">Shelleng</option>
                        <option value="Shendam">Shendam</option>
                        <option value="Shinkafi">Shinkafi</option>
                        <option value="Shira">Shira</option>
                        <option value="Shiroro">Shiroro</option>
                        <option value="Shongom">Shongom</option>
                        <option value="Shomolu">Shomolu</option>
                        <option value="Silame">Silame</option>
                        <option value="Soba">Soba</option>
                        <option value="Sokoto North">Sokoto North</option>
                        <option value="Sokoto South">Sokoto South</option>
                        <option value="Song">Song</option>
                        <option value="Southern Ijaw">Southern Ijaw</option>
                        <option value="Suleja">Suleja</option>
                        <option value="Sule Tankarkar">Sule Tankarkar</option>
                        <option value="Sumaila">Sumaila</option>
                        <option value="Suru">Suru</option>
                        <option value="Surulere">Surulere</option>
                        <option value="Vandeikya">Vandeikya</option>
                        <option value="Tafa">Tafa</option>
                        <option value="Tafawa Balewa">Tafawa Balewa</option>
                        <option value="Tai">Tai</option>
                        <option value="Takai">Takai</option>
                        <option value="Takum">Takum</option>
                        <option value="Talata Mafara">Talata Mafara</option>
                        <option value="Tambuwal">Tambuwal</option>
                        <option value="Tangaza">Tangaza</option>
                        <option value="Tarauni">Tarauni</option>
                        <option value="Tarka">Tarka</option>
                        <option value="Tarmuwa">Tarmuwa</option>
                        <option value="Taura">Taura</option>
                        <option value="Toungo">Toungo</option>
                        <option value="Tofa">Tofa</option>
                        <option value="Toro">Toro</option>
                        <option value="Toto">Toto</option>
                        <option value="Tsanyawa">Tsanyawa</option>
                        <option value="Tudun Wada">Tudun Wada</option>
                        <option value="Tureta">Tureta</option>
                        <option value="Udenu">Udenu</option>
                        <option value="Udi">Udi</option>
                        <option value="Udu">Udu</option>
                        <option value="Udung-Uko">Udung-Uko</option>
                        <option value="Ughelli North">Ughelli North</option>
                        <option value="Ughelli South">Ughelli South</option>
                        <option value="Ugwunagbo">Ugwunagbo</option>
                        <option value="Uhunmwonde">Uhunmwonde</option>
                        <option value="Ukanafun">Ukanafun</option>
                        <option value="Ukum">Ukum</option>
                        <option value="Ukwa East">Ukwa East</option>
                        <option value="Ukwa West">Ukwa West</option>
                        <option value="Ukwuani">Ukwuani</option>
                        <option value="Umuahia North">Umuahia North</option>
                        <option value="Umuahia South">Umuahia South</option>
                        <option value="Umu Nneochi">Umu Nneochi</option>
                        <option value="Ungogo">Ungogo</option>
                        <option value="Unuimo">Unuimo</option>
                        <option value="Uruan">Uruan</option>
                        <option value="Urue-Offong/Oruko">Urue-Offong/Oruko</option>
                        <option value="Ushongo">Ushongo</option>
                        <option value="Ussa">Ussa</option>
                        <option value="Uvwie">Uvwie</option>
                        <option value="Uyo">Uyo</option>
                        <option value="Uzo-Uwani">Uzo-Uwani</option>                           
                        <option value="Wamako">Wamako</option>
                        <option value="Wamba">Wamba</option>
                        <option value="Warawa">Warawa</option>
                        <option value="Warji">Warji</option>
                        <option value="Warri North">Warri North</option>
                        <option value="Warri South">Warri South</option>
                        <option value="Warri South West">Warri South West</option>
                        <option value="Wasagu/Danko">Wasagu/Danko</option>
                        <option value="Wase">Wase</option>
                        <option value="Wudil">Wudil</option>
                        <option value="Wukari">Wukari</option>
                        <option value="Wurno">Wurno</option>
                        <option value="Wushishi">Wushishi</option>
                        <option value="Yabo">Yabo</option>
                        <option value="Yagba East">Yagba East</option>
                        <option value="Yagba West">Yagba West</option>
                        <option value="Yakuur">Yakuur</option>
                        <option value="Yala">Yala</option>
                        <option value="Yamaltu/Deba">Yamaltu/Deba</option>
                        <option value="Yankwashi">Yankwashi</option>
                        <option value="Yauri">Yauri</option>
                        <option value="Yenagoa">Yenagoa</option>
                        <option value="Yola North">Yola North</option>
                        <option value="Yola South">Yola South</option>
                        <option value="Yorro">Yorro</option>
                        <option value="Yunusari">Yunusari</option>
                        <option value="Yusufari">Yusufari</option>
                        <option value="Zaki">Zaki</option>
                        <option value="Zango">Zango</option>
                        <option value="Zangon Kataf">Zangon Kataf</option>
                        <option value="Zaria">Zaria</option>
                        <option value="Zing">Zing</option>
                        <option value="Zurmi">Zurmi</option>
                        <option value="Zuru">Zuru</option>
                    </select>

                    <span class="text-danger"><?php echo $facultyErr; ?></span>
                    <label for="faculty" class="text-dark">Faculty</label>
                    <select class="form-control mb-3" name="faculty" id="faculty">
                        <option value="" selected>Select Faculty</option>
                        <option value="Science">Science</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Art">Art</option>
                    </select>

                    <span class="text-danger"><?php echo $imageErr; ?></span>
                    <span> <?php echo $_SESSION['status']; ?> </span>
                    <label for="image"> image </label>
                    <input type="file" name="img" class="form-control mb-3" id="img">

                    <span class="text-danger"> <?php echo $passwordErr; ?></span>
                    <label for="student Password" class="text-dark">Password </label>
                    <input class="form-control mb-1" placeholder="Enter a password" type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="myInput">
                    <input type="checkbox" onclick="myFunction()" class="mb-4"> Show password <br>

                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>

                    <input type="submit" value="CONTINUE" class="w-100 mb-3 btn btn-primary" name="reg">
                    
                </form>
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


<footer class="container-fluid text-center bg-dark">
  © 2022 School. All rights reserved. Developed by <a style="text-decoration: none;" href="https://www.instagram.com/king_ibelle/">King_ibelle</a>
</footer>


    <script src="./asset/js/jquery-3.5.1.min.js"></script>
    <script src="./asset/js/script.js"></script>

</body>

