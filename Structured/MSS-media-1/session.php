<?php
//session_start();
if( !isset($_SESSION['Email'] ) || !isset($_SESSION['PassWord'] ) ) {
    header("location:index.php");
    die();
}