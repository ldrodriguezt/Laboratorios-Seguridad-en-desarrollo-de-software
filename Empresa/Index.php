<?php
    if(isset($_POST['nombre_completo']) 
        && isset($_POST['email'])
        && isset($_POST['telefono'])
        && isset($_POST['ocupacion'])
        && isset($_POST['pref_comunicacion']) 
        && isset($_POST['usuario']) 
        && isset($_POST['password']))
    {
        $nombre_completo = $_POST['nombre_completo'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $ocupacion = $_POST['ocupacion'];
        $pref_comunicacion = $_POST['pref_comunicacion'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $dbuser = "admin_sql";
        $dbpassword = "Zaq1xsw2";
        
        $conn = new PDO("mysql:host=localhost; dbname=empresa", $dbuser, $dbpassword);
        
        //limpiasr credenciales
        $dbuser = "";
        $dbpassword = "";

        $query = "INSERT INTO `registro` (`id`, `nombre_completo`, `email`, `telefono`, `ocupacion`,`pref_comunicacion`, `usuario`, `password`) VALUES (NULL, '$nombre_completo', '$email', '$telefono', '$ocupacion', '$pref_comunicacion','$usuario', '$password');";
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
</style>

<head>
    <title>Registrese</title>
</head>
<div class="container">
    <center>
        <h1> Tecnologías Globales.</h1>
    </center>    
    <hr>
    <h2> Registro inicial de usuarios.</h2>
    <hr>
    <form action="" method="post">
        Nombre completo: <input type="text" name="nombre_completo" required><br>
        E-mail: <input type="text" name="email" required><br>
        Teléfono: <input type="text" name="telefono" required><br>
        Ocupación: <input type="text" name="ocupacion" required><br>

        <label>Medios de contacto:</label>

        <input type="radio" id="email" name="pref_comunicacion" value="e-mail">
        <label for="e-mail">E-mail</label>

        <input type="radio" id="llamada" name="pref_comunicacion" value="llamada">
        <label for="llamada">Llamada</label><br>

        Usuario: <input type="text" name="usuario" required><br>
        Password: <input type="password" name="password" required><br>
        <hr>
        <input type="submit" value="Registrarse">
        <hr>
        Ya tengo cuenta: <a href="http://localhost/Laboratorios-Seguridad-en-desarrollo-de-software/empresa/inicio_sesion.php" class="boton">Iniciar sesión</a>
    </form>
</div>

