<?php
session_start();
unset( $_SESSION['username']);
unset( $_SESSION['loggedin']);
unset( $_SESSION['time']);
unset( $_SESSION['counter']);
header("Location:./signup.php");


?>