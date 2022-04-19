<?php

    session_start();

    if(isset($_SESSION['login']) && isset($_SESSION['id'])) {
        $login = $_SESSION['login'];
        $iden = $_SESSION['id'];
    } else {
        session_destroy();
        header('location: ../index.php');
    }




?>