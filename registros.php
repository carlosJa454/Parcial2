<?php
	require 'conexion.php';

	$message = '';
	if (!empty($_POST['nombre']) && !empty($_POST['email'])) {
	$sql = "INSERT INTO usuarios (nombre, correo) VALUES (:nombre, :email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':email', $_POST['email']);

    if ($stmt->execute()) {
      $message = 'Nuevo usuario creado con éxito';
    } else {
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
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
    <title>Registrarse</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
</head>
<body>
    <header class="container">
        <nav>
            <a href="index.php" class="item-options">Inicio</a>
            <a href="iniciarSecion.php" class="item-options">Iniciar secion</a>
            <a href="habitaciones.html" class="item-options">Habitaciones</a>

        </nav>
    </header><br>
    <form class="form" id="form" action="registros.php" method="post">
        <h2 class="form_title">Registrarse</h2>
        <p class="form_paragraph">¿Ya tienes una cuenta?</p> <a href="iniciarSecion.php" class="form_link">Entra aquí</a>
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
                <input type="email" name="email" required id="email" class="form_input" placeholder=" ">
                <label for="email" class="form_label">Correo</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <div class="g-recaptcha" data-sitekey="6LcjXfMgAAAAABYWPJVfgUShYQwj3TcGfd4ilsCQ"></div>
            </div>
           
            <input class="form_submit" type="submit" value="Agregar">
            <p class="warnings" id="warnings"></p>
        </div>
    </form>
    <div class="error" id="error"></div>

    <script src="js/validar.js"></script>
   
</body>
</html>