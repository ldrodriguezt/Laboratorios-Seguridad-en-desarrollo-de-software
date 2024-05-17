<?php
    if(isset($_POST['usuario']) && isset($_POST['password']))
    {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $dbuser = "admin_sql";
        $dbpassword = "Zaq1xsw2";
        
        $conn = new PDO("mysql:host=localhost; dbname=peliculas", $dbuser, $dbpassword);
        
        $query = "SELECT * FROM registro WHERE usuario = :usuario AND password = :password";
        $q = $conn->prepare($query);
        $q->bindParam(':usuario', $usuario);
        $q->bindParam(':password', $password);
        $result = $q->execute();

        if ($q->rowCount() > 0) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header('Location: informacion_personal.php');
        } else {
            echo "Credenciales incorrectas. Inténtalo de nuevo.";
        }

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
    <title>Inicio de sesión</title>
</head>
<div class="container">
    
    <center>
        <h1>Mis peliculas favoritas.</h1>
    </center>    
    <hr>
    <form action="" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</div>