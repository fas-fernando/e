<?php

    session_start();
    if(isset($_SESSION['login']) && isset($_SESSION['id']) && isset($_SESSION['nivel']) && isset($_SESSION['vinculo'])) {
        $login = $_SESSION['login'];
        $iden = $_SESSION['id'];
        $nivel = $_SESSION['nivel'];
        $vinculo = $_SESSION['vinculo'];
    } else {
        session_destroy();
        header('location: ../index.php');
    }

?>