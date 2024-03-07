<?php
    if(isset($_POST['nombre']) 
        && isset($_POST['email'])
        && isset($_POST['tipo_solicitud'])
        && isset($_POST['asunto'])
        && isset($_POST['descripcion']) 
        && isset($_POST['fecha']))
    {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $tipo_solicitud = $_POST['tipo_solicitud'];
        $asunto = $_POST['asunto'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];

        $dbuser = "root";
        $dbpassword = "";
        
        $conn = new PDO("mysql:host=localhost; dbname=empresa", $dbuser, $dbpassword);
        
        //limpiasr credenciales
        $dbuser = "";
        $dbpassword = "";

        $query = "INSERT INTO `servicios` (`id`, `nombre`, `email`, `tipo_solicitud`, `asunto`,`descripcion`, `fecha`) VALUES (NULL, '$nombre', '$email', '$tipo_solicitud', '$asunto', '$descripcion','$fecha');";
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
    <title>Servicios.</title>
</head>

<div class="container">
    <body>
        <center>
            <h1>Servicios de Tecnologias globales. </h1>
        </center>    
        <form action="" method="post">
            Nombre: <input type="text" name="nombre" required>
            <br>
            Correo electrónico: <input type="text" name="email" required>
            <hr>

            <p>Seleccione el tipo de solicitud:</p>
            <input type="radio" name="tipo_solicitud" value="cotizacion" required>
            <label for="peticion">Cotización</label>
            <input type="radio" name="tipo_solicitud" value="capacitacion">
            <label for="queja">Capacitación</label>
            <input type="radio" name="tipo_solicitud" value="soporte tecnico">
            <label for="reclamo">Soporte técnico</label>
            <input type="radio" name="tipo_solicitud" value="asesoria">
            <label for="sugerencia">Asesoria</label>
            <br>
            Asunto: <input type="text" name="asunto" required><br>

            <label for="descripcion">Descripción de la solicitud (max.300 caracteres):</label><br>
            <textarea name="descripcion" rows="10" required></textarea>
            <br>
            <label for="fecha">Fecha tentativa de ejecución: </label>
            <input type="date" name="fecha"><br>
            <hr>
            <input type="submit" value="Enviar">
        </form>
    </body>
</div>    