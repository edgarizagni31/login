<?php  
    # validate session
    session_start();

    if ( isset( $_SESSION['user']) ) {
        header('location: index.php');
    }

    #connect db
    $connect = new mysqli('localhost','root','','login');
    $errors = '';
    $regexPass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";

    if ( $connect->connect_errno ) {
        die();
    }

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        extract($_POST);

        if (  empty($user) or empty($pass1) or empty($pass2) ) {
            $errors .= "<li>Por favor complete los campos correctamente</li>";
        }

        if (  !preg_match($regexPass,$pass1) or !preg_match($regexPass,$pass2) ) {
            $errors .= "<li>Contraseña no valida. Debe de contener por los menos ocho caracteres, al menos una letra y un número</li>";
        }

        if ( strlen($user) <= 3 ) {
            $errors .= "<li>Nombre de usuario no valido debe contener por lo menos tres caracteres.</li>";
        }

        if ( $pass1 != $pass2 ) {
            $errors .= "<li>Las contraseñas no conciden.</li>";
        }
        
        # validate username
        $stm = $connect->prepare("SELECT * FROM users WHERE username LIKE  ? LIMIT 1;");
        $searchUser = "%". $user ."%";
        $stm->bind_param('s', $searchUser);
        $result = $stm->execute();

        if ( $result ) {
            $rows = $stm->get_result()->num_rows;

            if ( $rows != 0) {
                $errors .= "<li>El nombre de usuario ya existe</li>";
            }
        }

        # add new user
        if ( empty($errors) ) {
            $hashed_pass = password_hash($pass1, PASSWORD_BCRYPT);

            $stm = $connect->prepare("INSERT INTO users ( username, pass ) VALUES ( ?, ?)");
            $stm->bind_param('ss', $user, $hashed_pass);
            $result = $stm->execute();

            if ( $stm->affected_rows == 1){
                header('location:login.php');
            } else {
                echo "<script> alert('Ha ocurrido un error inesperado intentelo nuevamente.') </script>";
                die();
            }
        }
    }

    require 'view/register.view.php';
?>
