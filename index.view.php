<!DOCTYPE html>
<html >
<head>       
    <!--Fonts-->    
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="styles.css">
    <title>Formulario de Contacto</title>
</head>
<body>
    <div class="container">
        <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " method="post">

            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php if(!$enviado && isset($nombre)) echo $nombre ?>">
            <input type="email" name="email" class="form-control" placeholder="Email" value=" <?php if(!$enviado && isset($email)) echo $email ?>">
            <textarea name="mensaje" class="form-control" placeholder="Mensaje" id="textarea"><?php if(!$enviado && isset($mensaje)) echo $mensaje ?></textarea>

            <?php if(!empty($errores)) : ?> 
                <div class="clear"></div>       
                <div class="alert error">
                    <?php echo $errores; ?>
                </div>

            <?php elseif($enviado) : ?>
                <div class="clear"></div>   
                <div class="alert success">
                    <p>Enviado correctamente</p>
            </div>
            <?php endif ?>

            <input type="submit" name="submit" class="boton" value="Enviar Email">
        </form>
    </div>
</body>
</html>