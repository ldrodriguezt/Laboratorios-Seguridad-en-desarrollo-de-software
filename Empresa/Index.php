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

        $dbuser = "root";
        $dbpassword = "";
        
        $conn = new PDO("mysql:host=localhost; dbname=empresa", $dbuser, $dbpassword);
        $dbuser = "";
        $dbpassword = "";
        $query = "INSERT INTO `registro` (`id`, `nombre_completo`, `email`, `telefono`, `ocupacion`, `pref_comunicacion`, `usuario`, `password` ) VALUES (NULL, '$nombre_completo', '$email', '$telefono', '$ocupacion', '$pref_ocupacion', '$usuario', '$password');";
        $q = $conn->prepare($query);
        $result = $q->execute();
    }   
                
?>


<style>
        .container {
            width: 50%; 
            margin: 0 auto; 
        }
</style>

<div class="container">
    <h1> Registro inicial de usuarios.</h1>
    <hr>
    <form action="" method="post">
        Nombre completo: <input type="text" name="nombre_completo" required><br>
        E-mail: <input type="text" name="email" required><br>
        Teléfono: <input type="text" name="telefono" required><br>
        Ocupación: <input type="text" name="ocupacion" required><br>
        ¿Como prefiere que nos comuniquemos con usted?: <input type="checkbox" name="llamda" value="llamada">
                Llamada. 
        <input type="checkbox" name="email" value="email">
            Correo electroníco.        
        <br>
        Usuario: <input type="text" name="usuario" required><br>
        Password: <input type="password" name="password" required><br>
        <hr>
        <input type="submit" value="Registrarse">
    </form>
</div>