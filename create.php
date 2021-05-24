<?php
$servidor = "4.tcp.ngrok.io:11945";
$username = 'user_test_persona';
$password = '12345678';
$database = "PERSONAS_BD";
//conexión a mysql
$con = new mysqli($servidor, $username, $password, $database);

if (isset($_POST['name']) && !empty($_POST['name'])) {
    $consulta = "INSERT INTO persona (name,position,location,industry,income,age,marital_status,goals,needs,interests,wants,fears,story,tools,social_networks,brands)
                    VALUES ('" . $_POST["name"] . "','" . $_POST["position"] . "','" . $_POST["location"] . "',
                    '" . $_POST["industry"] . "','" . $_POST["income"] . "','" . $_POST["age"] . "',
                    '" . $_POST["marital_status"] . "','" . $_POST["goals"] . "','" . $_POST["needs"] . "','" . $_POST["interests"] . "',
                    '" . $_POST["wants"] . "','" . $_POST["fears"] . "','" . $_POST["story"] . "','" . $_POST["tools"] . "','" . $_POST["social_networks"] . "','" . $_POST["brands"] . "'); ";

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

    <section class="hero is-link">
        <div class="hero-body has-text-centered">
            <p class="title">
                Formulario de registro de usuarios
            </p>
        </div>
    </section>

    <div class="container mt-5 mb-5">
        <div class="columns">
            <div class="column is-1"></div>
            <div class="column is-10">
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
            </div>
        </div>
    </div>

    <div class="container">
        <div class="box ml-6 mr-6 mb-6">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="field">
                    <label class="label">Nombre:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="name" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Ocupación:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="position" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Location:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="location" required>
                    </div>
                </div>


                <div class="field">
                    <label class="label">Industry:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="industry" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Income:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="income" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Age:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="age" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Marital status:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="marital_status" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Goals:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="goals" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Needs:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="needs" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Interests:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="interests" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Fears:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="fears" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Story:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="story" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Tools:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="tools" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Social networks:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="social_networks" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Brands:</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="brands" required>
                    </div>
                </div>


                <div class="field is-grouped mt-5">
                    <div class="control">
                        <button class="button is-link">Guardar registro</button>
                    </div>
                </div>

            </form>
        </div>

    </div>


</body>

</html>