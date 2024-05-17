<?php
session_start();

try {
    if(isset($_POST['usuario']) && isset($_POST['password']))
    {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $dbuser = "admin_sql";
        $dbpassword = "Zaq1xsw2";
        
        $conn = new PDO("mysql:host=localhost; dbname=peliculas", $dbuser, $dbpassword);

        $dbuser = "";
        $dbpassword = "";
        
        $query = "SELECT usuario, password FROM registro WHERE usuario = :usuario AND password = :password";
        $q = $conn->prepare($query);
        $result = $q->execute(array(
            ':usuario' => $usuario,
            ':password' => sha1($password)
        ));
        if($q->rowCount() == 1){
            $_SESSION["usuario"] = $usuario;
            $_SESSION["usuario_esta_logueado"] = true;
            $_SESSION['lastaccess'] = time();
            header("location: informacion_personal.php");
        }
        else {
            echo "Usuario o clave no validos";
        }
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

</style>

<head>
    <title>Inicio de sesión</title>
</head>
<div class="container">
    
    <center>
        <h1>Inicie sesión en "Mis peliculas favoritas."</h1>
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