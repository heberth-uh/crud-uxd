<?php
    $servidor="localhost";
    $username='root';
    $password='';
    $database="ejemplo";

    if (isset($_GET['id'])){
        $idProyecto=$_GET['id'];
    }else{
        die("No existe el id del proyecto solicitado");
    }

    //conexión a mysql
    $con=new mysqli($servidor, $username, $password, $database);
    //consulta mysql
    $consulta="delete from usuarios where id=$idProyecto";
    //ejecutar consulta
    if($con->query($consulta)){
        $notif='El registro se eliminó correctamente';
    }else{
        $notif='No se pudo eliminar el registro: '.$con->error;
    }
    //cerrar conexión
    $con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <title>Perfil de usuario</title>
</head>
<body>
    <div class="container">
    <div class="notification is-primary">
    <button class="delete"></button>
        <?php echo $notif ?>
    </div>
    </div>
</body>
</html>