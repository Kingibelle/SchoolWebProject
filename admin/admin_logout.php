<?php
    session_start();
    unset($_SESSION['Email']);
    session_destroy();
    header("location: ../admin/admin.php");
?>