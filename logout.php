<?php 
    session_start();
    $_SESSION['online'] = false;
    session_destroy();
    header("Location: index.php");
?>