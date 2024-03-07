<?php
    if(isset($_POST['usuario']) && isset($_POST['password']))
    {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $dbuser = "admin_sql";
        $dbpassword = "Zaq1xsw2";
        
        $conn = new PDO("mysql:host=localhost; dbname=empresa", $dbuser, $dbpassword);
        
        //limpiasr credenciales
        $dbuser = "";
        $dbpassword = "";
        
        $query = "SELECT * FROM registro WHERE usuario = :usuario AND password = :password";
        $q = $conn->prepare($query);
        $q->bindParam(':usuario', $usuario);
        $q->bindParam(':password', $password);
        $result = $q->execute();

        if ($q->rowCount() > 0) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header('Location: pagina_inicial.php');
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
</style>

<head>
    <title>Inicio de sesión</title>
</head>
<div class="container">
    
    <center>
        <h1>Inicio de sesión en Tecnologías globales.</h1>
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