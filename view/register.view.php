<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Registrate</h1> 
   <form 
    action= <?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ?> 
    method="POST"
   >
        <input type="text" name="user" id="" placeholder="Usuario">
        <input type="password" name="pass1"  placeholder="Contraseña">
        <input type="password" name="pass2" placeholder="Repetir contraseña">
        <input type="submit" value="Registrar" >
   </form>
   <ul>
        <?php  
            echo $errors;
        ?>
   </ul>
</body>
</html>