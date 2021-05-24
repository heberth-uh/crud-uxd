<?php
$servidor = "localhost";
$username = 'root';
$password = '';
$database = "ejemplo";
//conexión a mysql
$con = new mysqli($servidor, $username, $password, $database);
//consulta mysql
$consulta = "select * from usuarios";
//ejecutar consulta
$resultados = $con->query($consulta);

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
    <title>lista de usuarios</title>
</head>

<body>
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-full">
                <h1 class="title">Lista de usuarios</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $resultados->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['nombres'] ?></td>
                                <td><?php echo $row['apellidos'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['telefono'] ?></td>
                                <td><a href="readDetalle.php?id=<?php echo $row['id'] ?>">Ver</a> | <a href="update.php?id=<?php echo $row['id'] ?>">Editar</a> | <a href="delete.php?id=<?php echo $row['id'] ?>">Eliminar</a></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>