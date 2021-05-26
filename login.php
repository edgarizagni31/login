<?php  
    # validate session
    session_start();

    if ( isset($_SESSION['user']) ) {
        header('location: index.php');
    }

    # connect db
    $connect = new mysqli('localhost','root', '', 'login' );
    $errors = "";

    if ( $connect->connect_errno  ) {
        die();
    }

    # validate form
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        extract($_POST);

        if ( empty($user) or empty($password) ) {
            $errors .= "<li>Por favor complete los campos correctamente.</li>";
        }        

        $stm = $connect->prepare("SELECT username, pass FROM users WHERE username LIKE ?");
        $search_user = "%". $user ."%";
        $stm->bind_param('s', $search_user);
        $status = $stm->execute();

        if ( $status ) {
            $result = $stm->get_result();
            $rows = $result->num_rows;

            if ( $rows == 0 ) {
                $errors .= "<li>El usuario no existe.</li>";
            } else {
                extract($result->fetch_assoc());

                if ( password_verify( $password ,$pass) ) {
                    $_SESSION['user'] = $user;
                }else {
                    $errors .= "<li>Contraseña incorrecta</li>";
                }
            }
        } else {
            die();
        }

        if ( empty($errors) ) {
            header('location: index.php');
        }
    }

    require 'view/login.view.php';
?>