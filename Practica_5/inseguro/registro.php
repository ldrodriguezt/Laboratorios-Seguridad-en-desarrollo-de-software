<?php
    if(isset($_GET['nombre_completo']) 
        && isset($_GET['email'])
        && isset($_GET['usuario']) 
        && isset($_GET['password'])
        && isset($_GET['genero'])
        && isset($_GET['favoritas']))

    {
        $nombre_completo = $_GET['nombre_completo'];
        $email = $_GET['email'];
        $usuario = $_GET['usuario'];
        $password = $_GET['password'];
        $genero = $_GET['genero'];
        $favoritas = $_GET['favoritas'];


        $dbuser = "admin_sql";
        $dbpassword = "Zaq1xsw2";
        
        $conn = new PDO("mysql:host=localhost; dbname=peliculas", $dbuser, $dbpassword);
        

        $query = "INSERT INTO `registro` (`id`, `nombre_completo`, `email`, `usuario`, `password`,`genero`, `favorita`) VALUES (NULL, '$nombre_completo', '$email', '$usuario', '$password', '$genero','$favoritas');";
        $q = $conn->prepare($query);
        $result = $q->execute();

        header("Location: inicio_sesion.php");
        exit;
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
    <title>Registro de usuario "Mis peliculas favoritas"</title>
</head>
<div class="container">
<body>
    <center>
        <h1>Registro de usuario</h1>
    </center> 
    <form action="" method="get">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre_completo" required><br>

        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" required><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <p>¿Qué tipo de películas te gustan?</p>
        <select id="genero" name="genero">
            <option value="Comedia">Comedia</option>
            <option value="Drama">Drama</option>
            <option value="Acción">Acción</option>
            <option value="Ciencia ficción">Ciencia ficción</option>
            <option value="Fantasía">Fantasía</option>
            <option value="Terror">Terror</option>
            <option value="Romance">Romance</option>
            <option value="Aventura">Aventura</option>
            <option value="Animación">Animación</option>
            <option value="Documental">Documental</option>
        </select>

        <p>¿Cuáles son tus películas favoritas?</p>
        <textarea id="favoritas" name="favoritas" rows="4" cols="50"></textarea><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</div>