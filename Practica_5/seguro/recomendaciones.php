<?php 
session_start();
    try {
        if(isset($_POST["genero"]) && isset($_POST["recomendacion"]) ){
            $genero = $_POST["genero"];
            $recomendacion = $_POST["recomendacion"];

            $dbuser = "admin_sql";
            $dbpassword = "Zaq1xsw2";
            
            $conn = new PDO("mysql:host=localhost;dbname=peliculas", $dbuser, $dbpassword);

            $dbuser = "";
            $dbpassword = "";

            $listaBlancaDeTags = "<h1></h1><p></p>";
            $textoRecomendacionSeguro = strip_tags($recomendacion, $listaBlancaDeTags);

            $query = "INSERT INTO `recomendaciones` (`id`, `usuario`, `genero`, `recomendacion`) VALUES (NULL, :usuario, :genero, :recomendacion);";
            $q1 =  $conn->prepare($query);
            $result = $q1->execute(array(
                ':usuario' => $_SESSION["usuario"],
                ':genero' => $genero,
                ':recomendacion' => $textoRecomendacionSeguro
            ));
            }
        
            $dbuser = "admin_sql";
            $dbpassword = "Zaq1xsw2";
    
            $conn = new PDO("mysql:host=localhost;dbname=peliculas", $dbuser, $dbpassword);

            $dbuser = "";
            $dbpassword = "";

            $query = "SELECT genero, recomendacion, usuario FROM `recomendaciones`;";
            $q =  $conn->prepare($query);
            $result = $q->execute();

            if (time() > ($_SESSION['lastaccess'] + 3600))
            {
                session_unset();
                session_destroy();
                echo "LAST ACCESS IF";
            }
            else
            {
                echo "LAST ACCESS ELSE";
                $_SESSION['lastaccess'] = time();
            }

        }  
        catch(Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage();
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


<html>
    <head>
        <title>recomendaciones</title>
    </head>

    <div class="container">
        <body>
                <h1>Bienvenido <b><?php echo $_SESSION["usuario"]; ?></b></h1>
                <p><?php echo $_SERVER['REMOTE_ADDR'] ?></p>
                <p><?php echo $_SERVER['HTTP_USER_AGENT'] ?></p>
                <a href="index.php">Inicio "Mis peliculas favoritas"</a>
            <h2>Haz tus recomendaciones de las peliculas que más te gusten con una pequeña reseña. </h2>
            <?php 
                while ($row = $q->fetch()) {
            ?>
                <div>
                    <div>
                        <?php echo $row["genero"];?> <?php echo$row["recomendacion"]; ?>. by <?php echo $row["usuario"]; ?>
                    </div>
                </div> 
                <hr>
            <?php 
                }
            ?>
            <form action="" method="post">
                Danos tu recomendación <br>
                <label">Género:</label>
                <input type="text" id="genero" name="genero" required><br>
                <textarea name="recomendacion" cols="80" rows="10"></textarea> <br/>
                <input type="submit" value="Recomendar"> <br/>
            </form>
        </body>
    </div>    
</html>