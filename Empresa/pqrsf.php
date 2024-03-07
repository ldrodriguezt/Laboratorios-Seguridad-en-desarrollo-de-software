<?php
    if(isset($_POST['nombre']) 
        && isset($_POST['email'])
        && isset($_POST['tipo_solicitud'])
        && isset($_POST['mensaje']))

    {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $tipo_solicitud = $_POST['tipo_solicitud'];
        $mensaje = $_POST['mensaje'];


        $dbuser = "root";
        $dbpassword = "";
        
        $conn = new PDO("mysql:host=localhost; dbname=empresa", $dbuser, $dbpassword);
        
        //limpiasr credenciales
        $dbuser = "";
        $dbpassword = "";

        $query = "INSERT INTO `pqrsf` (`id`, `nombre`, `email`, `tipo_solicitud`, `mensaje`) VALUES (NULL, '$nombre', '$email', '$tipo_solicitud', '$mensaje');";
        $q = $conn->prepare($query);
        $result = $q->execute();

        header("Location: pagina_inicial.php");
        exit;
    }   
                
?>



<style>
    .container {
        width: 50%; 
        margin: 0 auto; 
    }

    textarea {
        width: 100%;
        max-width: 800px; 
    }

</style>


<head>
    <title>PQRSF</title>
</head>

<div class="container">
    <body>
        <center>
            <h1>Registro PQRSF.</h1>
        </center>

        <form action="" method="post">

            Nombre: <input type="text" name="nombre" required>
            <br>
            Correo electrónico: <input type="text" name="email" required>
            <hr>

            <p>Seleccione el tipo de solicitud:</p>
            <input type="radio" id="peticion" name="tipo_solicitud" value="peticion" required>
            <label for="peticion">Petición</label>
            <input type="radio" id="queja" name="tipo_solicitud" value="queja">
            <label for="queja">Queja</label>
            <input type="radio" id="reclamo" name="tipo_solicitud" value="reclamo">
            <label for="reclamo">Reclamo</label>
            <input type="radio" id="sugerencia" name="tipo_solicitud" value="sugerencia">
            <label for="sugerencia">Sugerencia</label>
            <input type="radio" id="felicitacion" name="tipo_solicitud" value="felicitacion">
            <label for="felicitacion">Felicitación</label><hr>

            <label for="mensaje">Mensaje (max.300 caracteres):</label><br>
            <textarea id="mensaje" name="mensaje" rows="10" required></textarea>
            <hr>

            <input type="submit" value="Enviar">
        </form>
    </body>
</div>
</html>