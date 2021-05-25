<?php  
    session_start();

    if ( isset( $_SESSION['user']) ) {
        require 'view/main.view.php';
    } else {
        header('location: index.php');
    }

?>