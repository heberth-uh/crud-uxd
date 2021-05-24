<?php
    $servidor="localhost";
    $username='root';
    $password='';
    $database="ejemplo";
    //conexión a mysql
    $con=new mysqli($servidor, $username, $password, $database);

    if (isset($_GET['id'])){
        $idProyecto=$_GET['id'];
    }else if(isset($_POST['id'])){
        $idProyecto=$_POST['id'];
    }else{
        die("No existe el id del proyecto solicitado");
    }
    //consulta mysql
    $consulta="select * from usuarios where id=$idProyecto";
    //ejecutar consulta
    $resultado=$con->query($consulta);
    $us=$resultado->fetch_assoc();

    //consulta mysql
    if(isset($_POST['nombres']) && !empty($_POST['nombres'])){
        $nom=$_POST['nombres'];
        $ap=$_POST['apellidos'];
        $email=$_POST['email'];
        $tel=$_POST['telefono'];
    
        $consulta="update usuarios 
                    set nombres='$nom', apellidos='$ap',email='$email',telefono='$tel'
                    where id=$idProyecto";
        //echo $consulta;
        //ejecutar consulta
        if($con->query($consulta)===TRUE){
            $notif="el registro de usuario fue exitoso";
        }else{
            $notif="Hubo un error en el proceso de registro: ".$con->error;
        }    
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
    <title>tabla de proyectos</title>
</head>
<body>
    <div class="container">
    
    
    <div class="columns">
        <div class="column"></div>
        <div class="column is-half">
            <h1 class="title">Formulario de registro de usuarios</h1>
            <?php
            if (isset($notif)){
            ?>
            <div class="notification is-primary">
            <button class="delete"></button>
                <?php echo $notif ?>
            </div>
            <?php
            }
            ?>
            <div class="box">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <input class="input is-primary" type="text" placeholder="nombres" name="nombres" value="<?php echo $us['nombres'] ?>" required>
                    <input class="input is-primary" type="text" placeholder="apellidos" name="apellidos" value="<?php echo $us['apellidos'] ?>" required>
                    <input class="input is-primary" type="email" placeholder="email" name="email" value="<?php echo $us['email'] ?>" required>
                    <input class="input is-primary" type="number" placeholder="telefono" name="telefono" value="<?php echo $us['telefono'] ?>" required>
                    <input type="hidden" name="id" value="<?php echo $us['id'] ?>">
                    <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Actualizar usuario</button>
                    </div>
                    <div class="control">
                        <button class="button is-link is-light">Cancelar</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="column"></div>
    </div>
    </div>
</body>
</html>