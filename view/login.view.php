<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form action= <?php   echo htmlspecialchars($_SERVER['PHP_SELF'])?> method="POST">
        <input type="text" name="user" placeholder="Usuario">
        <input type="password" name="password"  placeholder="Contraseña">
        <input type="submit" value="Logear" >
        <p>¿Aun no tienes una cuenta?</p>
        <a href="register.php" >Registrate</a>
    </form>
    
</body>
</html>