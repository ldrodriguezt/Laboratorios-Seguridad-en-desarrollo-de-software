<?php 
session_start();

            try {

                if(isset($_SESSION["usuario"])){
            
                    $nombre_completoValue = "";
                    $emailValue = "";
                    $generoValue = "";
                    $favoritaValue = "";

                    $dbuser = "admin_sql";
                    $dbpassword = "Zaq1xsw2";
            
                    $conn = new PDO("mysql:host=localhost;dbname=peliculas", $dbuser, $dbpassword);

                    $usuario = $_SESSION["usuario"];

                    $query = "SELECT nombre_completo, email, usuario, genero, favorita FROM `registro` WHERE usuario = '$usuario';";
                    $q =  $conn->prepare($query);
                    $result = $q->execute();

                    $row = $q->fetch();
                    $nombre_completoValue = $row["nombre_completo"];
                    $emailValue = $row["email"];
                    $generoValue = $row["genero"];
                    $favoritaValue = $row["favorita"];
                }

                if(isset($_GET["nombre_completo"]) && isset($_GET["email"]) && isset($_GET["genero"]) && isset($_GET["favorita"]) ){
                    $nombre_completo = $_GET["nombre_completo"];
                    $email = $_GET["email"];
                    $genero = $_GET["genero"];
                    $favorita = $_GET["favorita"];

                    $nombre_completoValue = $nombre_completo;
                    $emailValue = $email;
                    $generoValue = $genero;
                    $favoritaValue = $favorita;


                    $dbuser = "admin_sql";
                    $dbpassword = "Zaq1xsw2";
            
                    $conn = new PDO("mysql:host=localhost;dbname=peliculas", $dbuser, $dbpassword);

                    $usuario = $_SESSION["usuario"];

                    $query = "UPDATE `registro` SET nombre_completo='$nombre_completo', email='$email', genero='$genero', favorita='$favorita' WHERE usuario='$usuario';";
                    $q =  $conn->prepare($query);
                    $result = $q->execute();

                }
            }
            catch(Exception $e){
                echo 'Excepción capturada: ',  $e->getMessage();
                echo $nombre_completoValue;
            }
        ?>
        
      <style>
        .container {
            width: 50%; 
            margin: 0 auto; 
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>

        <head>
            <title>Información personal</title>
        </head>
        <div class="container">
            <body>
                <form action="" method="get">
                    <h1>Bienvenido, <b><?php echo $_SESSION["usuario"]; ?></b></h1>
                    <p>Nombre: <input type="text" name="nombre_completo" value="<?php echo $nombre_completoValue; ?>"></p>
                    <p>Correo electrónico: <input type="text" name="email" value="<?php echo $emailValue; ?>"></p>
                    <p>Género de películas favoritas: <input type="text" name="genero" value="<?php echo $generoValue; ?>"></p>
                    <p>Películas favoritas: <input type="text" name="favorita" value="<?php echo $favoritaValue; ?>"></p>
                    <input type="submit" value="Actualizar"> <br/>
                </form>    
                <a href="inicio_sesion.php">Cerrar sesión</a>
            </body>
        </div>
