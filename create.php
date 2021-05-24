<?php
$servidor = "4.tcp.ngrok.io:11945";
$username = 'user_test_persona';
$password = '12345678';
$database = "PERSONAS_BD";
//conexión a mysql
$con = new mysqli($servidor, $username, $password, $database);

if (isset($_POST['name']) && !empty($_POST['name'])) {
    $consulta = "INSERT INTO persona (name,position,location,industry,income,age,marital_status,goals,needs,interests,wants,fears,story,tools,social_networks,brands)
                    VALUES ('" . $_POST["name"] . "','" . $_POST["position"] . "','" . $_POST["location"]. "',
                    '" . $_POST["industry"] ."','" . $_POST["income"] ."','" . $_POST["age"] ."',
                    '" . $_POST["marital_status"] ."','" . $_POST["goals"] ."','" . $_POST["needs"] ."','" . $_POST["interests"] ."',
                    '" . $_POST["wants"] ."','" . $_POST["fears"] ."','" . $_POST["story"] ."','" . $_POST["tools"] ."','" . $_POST["social_networks"] ."','" . $_POST["brands"] ."'); ";

    if ($con->query($consulta) === TRUE) {
        $notif = "El registro de usuario fue exitoso";
    } else {
        $notif = "Hubo un error en el proceso de registro: " . $con->error;
    }
}

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
                if (isset($notif)) {
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
                        <input class="input is-primary" type="text" placeholder="Nombre" name="name" required>
                        <input class="input is-primary" type="text" placeholder="Ocupación" name="position" required>
                        <input class="input is-primary" type="text" placeholder="location" name="location" required>
                        <input class="input is-primary" type="text" placeholder="industry" name="industry" required>
                        <input class="input is-primary" type="text" placeholder="income" name="income" required>
                        <input class="input is-primary" type="text" placeholder="age" name="age" required>
                        <input class="input is-primary" type="text" placeholder="marital_status" name="marital_status" required>
                        <input class="input is-primary" type="text" placeholder="goals" name="goals" required>
                        <input class="input is-primary" type="text" placeholder="needs" name="needs" required>
                        <input class="input is-primary" type="text" placeholder="interests" name="interests" required>
                        <input class="input is-primary" type="text" placeholder="fears" name="fears" required>
                        <input class="input is-primary" type="text" placeholder="story" name="story" required>
                        <input class="input is-primary" type="text" placeholder="tools" name="tools" required>
                        <input class="input is-primary" type="text" placeholder="social_networks" name="social_networks" required>
                        <input class="input is-primary" type="text" placeholder="brands" name="brands" required>

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
<<<<<<< HEAD
</html>
=======

</html>
>>>>>>> f1dd17bbb3c2910900a621a5098838219c33a9b6
