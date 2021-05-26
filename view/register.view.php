<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ee726eb0d9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/form.css">
    <title>Registrar</title>
</head>
<body>
    <div class="wrapper">
        <h1 class="title">Registrate</h1>
        <!-- FORM  -->
        <form 
            action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> 
            method="POST"
            class="form"
        >
            <!-- FORM USER  -->
            <div class="form__group">
                <i class="far fa-user icon"></i>
                <input type="text" name="user" placeholder="Usuario" class="form__input" autocomplete="off">
            </div>
            <!-- FORM PASS1  -->
            <div class="form__group">
                <i class="fas fa-key icon"></i>
                <input type="password" name="pass1" placeholder="Contraseña" class="form__input" autocomplete="off">
                <i class="fas fa-eye icon-2"></i>
            </div>
            <!-- FORM PASS2  -->
            <div class="form__group">
                <i class="fas fa-key icon"></i>
                <input type="password" name="pass2" placeholder="Contraseña" class="form__input" autocomplete="off">
                <i class="fas fa-eye icon-2"></i>
            </div>
            <input type="submit" value="Registrarte" class="form__btn">
            <p class="form__text">¿Tienes una cuenta?</p>
            <a href="login.php" class="form__link">Inicia seccion</a>
        </form>
        <ul>
            <?php
            echo $errors;
            ?>
        </ul>
    </div>
    <script src="js/show_pass.js"></script>
</body>
</html>