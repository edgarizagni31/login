<?php  
    session_start();

    if ( isset($_SESSION['user']) ) {
        header('location: index.php');
    }

    $connect = new mysqli('localhost','root', '', 'login' );

    if ( $connect->connect_errno  ) {
        die();
    }

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        extract($_POST);

        $stm = $connect->prepare("SELECT username, pass FROM users WHERE username LIKE ?");
        $search_user = "%". $user ."%";
        $stm->bind_param('s', $search_user);
        $status = $stm->execute();

        if ( $status ) {
            $result = $stm->get_result();
            extract($result->fetch_assoc());

            if ( password_verify( $password ,$pass) ) {
                $_SESSION['user'] = $user;
                header('location: index.php');
            }else {
                echo "Contraseña incorrecta";
            }
        }

    }

    require 'view/login.view.php';
?>