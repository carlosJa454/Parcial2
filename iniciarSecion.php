<?php
    session_start();

    require 'conexion.php';

    if (!empty($_POST['nombre']) && !empty($_POST['correo'])) {
        $records = $conn->prepare('SELECT id_usuario, nombre, correo FROM usuarios WHERE nombre = :nombre');
        $records->bindParam(':nombre', $_POST['nombre']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        $message = '';

        if (count($results) > 0 && password_verify($_POST['nombre'], $results['nombre'])){
      $_SESSION['user_id'] = $results['id_usuario'];
      header("Location: /reservacionHotel/index.php");
    } else {
      $message = 'Lo sentimos, esas credenciales no coinciden';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Iniciar Sesión</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
</head>
<body>
    <header class="container">
        <nav>
            <a href="index.php" class="item-options">Inicio</a>
            <a href="registros.php" class="item-options">Registrarse</a>
            <a href="habitaciones.html" class="item-options">Habitaciones</a>

        </nav>
    </header><br>
    <form class="form" id="form" action="iniciarSecion.php" method="post">
        <h2 class="form_title">Inicia Sesión</h2>
        <p class="form_paragraph">¿Aún no tienes una cuenta?</p> <a href="registros.php" class="form_link">Entra aquí</a>

        <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
        <?php endif; ?>

        <div class="form_container">
            <div class="form_group">
                <input type="text" required name="nombre" name="nombre" id="nombre" class="form_input" placeholder=" ">
                <label for="nombre" class="form_label">Nombre</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="email" name="correo" required id="email" class="form_input" placeholder=" ">
                <label for="email" class="form_label">Correo</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <div class="g-recaptcha" data-sitekey="6LcjXfMgAAAAABYWPJVfgUShYQwj3TcGfd4ilsCQ"></div>
            </div>
           
            <input class="form_submit" type="submit"  value="Enviar">
            <p class="warnings" id="warnings"></p>
        </div>
    </form>
    <div class="error" id="error"></div>

    <script src="js/validar.js"></script>
   
</body>
</html>