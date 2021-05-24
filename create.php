<?php
    $servidor="localhost";
    $username='root';
    $password='';
    $database="ejemplo";
    //conexión a mysql
    $con=new mysqli($servidor, $username, $password, $database);
    //consulta mysql

    if(isset($_POST['nombres']) && !empty($_POST['nombres'])){
        $nom=$_POST['nombres'];
        $ap=$_POST['apellidos'];
        $email=$_POST['email'];
        $tel=$_POST['telefono'];
    
        $consulta="insert into usuarios (nombres,apellidos,email,telefono)
                    values('$nom','$ap','$email','$tel')";
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
                    <input class="input is-primary" type="text" placeholder="nombres" name="nombres" required>
                    <input class="input is-primary" type="text" placeholder="apellidos" name="apellidos" required>
                    <input class="input is-primary" type="email" placeholder="email" name="email" required>
                    <input class="input is-primary" type="number" placeholder="telefono" name="telefono" required>
                   
                    <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">guardar usuario</button>
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