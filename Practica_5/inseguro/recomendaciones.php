<?php 
session_start();
                if(isset($_GET["genero"]) && isset($_GET["recomendacion"]) ){
                    $genero = $_GET["genero"];
                    $recomendacion = $_GET["recomendacion"];

                    $dbuser = "admin_sql";
                    $dbpassword = "Zaq1xsw2";
            
                    $conn = new PDO("mysql:host=localhost;dbname=peliculas", $dbuser, $dbpassword);
                    $usuario = $_SESSION["usuario"];
                    $query = "INSERT INTO `recomendaciones` (`id`, `usuario`, `genero`, `recomendacion`) VALUES (NULL, '$usuario', '$genero', '$recomendacion');";
                    $q1 =  $conn->prepare($query);
                    $result = $q1->execute();
                }

            
            $dbuser = "admin_sql";
            $dbpassword = "Zaq1xsw2";
    
            $conn = new PDO("mysql:host=localhost;dbname=peliculas", $dbuser, $dbpassword);

            $query = "SELECT genero, recomendacion, usuario FROM `recomendaciones`;";
            $q =  $conn->prepare($query);
            $result = $q->execute();
            

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
            <form action="" method="get">
                Danos tu recomendación <br>
                <label">Género:</label>
                <input type="text" id="genero" name="genero" required><br>
                <textarea name="recomendacion" cols="80" rows="10"></textarea> <br/>
                <input type="submit" value="Recomendar"> <br/>
            </form>
        </body>
    </div>    
</html>