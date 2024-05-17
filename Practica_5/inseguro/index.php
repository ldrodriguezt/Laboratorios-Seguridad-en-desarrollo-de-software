<?php 
session_start();
?>

<style>
        .container {
            width: 50%; 
            margin: 0 auto; 
        }

</style>

    <head>
        <title>
            Inicio "Mis peliculas favoritas"
        </title>
    </head>
    <div class="container">
        <body>    
            <?php 
                if($_SESSION["usuario"])
                    ?>
                    <h1>Bienvenido a "Mis peliculas favoritas", <?php echo $_SESSION["usuario"]; ?> </h1>
                <?php ?>

                <button onclick= location.href="inicio_sesion.php">Login</button><br>
                <button onclick= location.href="registro.php">Sign up</button><br>
                <?php 
                    if($_SESSION["usuario"]){
                    ?>
                    <button onclick= location.href="informacion_personal.php">Ver y/o actualizar información personal.</button> <br>
                    <button onclick= location.href="recomendaciones.php">Danos tus mejores recomendaciones de peliculas con su respectivo Género.</button> 
                <?php } ?>                
        </body>
    </div>
   
