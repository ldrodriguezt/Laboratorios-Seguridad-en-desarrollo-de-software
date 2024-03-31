<html>

    <style>
        .container {
            width: 50%; 
            margin: 0 auto; 
         }
    </style>

    <head>
        <title> Busqueda de carreras por filtro de dos campos </title>
    </head>


    <div class="container">
    <body>
        <h1> Busqueda de carreras por filtro de dos campos </h1>

        <form action = "" method = GET>
            Ingrese el nombre de la facultad: 
            <input type ="text" name = "facultad">
            
            Ingrese el tipo de carrera: 
            <input type ="text" name = "tipo">

            <input type ="submit" value= "Buscar">
        </form>

        <?php
            if(isset($_GET["facultad"]) && isset($_GET["tipo"])){
                $facultad = $_GET["facultad"];
                $tipo = $_GET["tipo"];
                echo "Busqueda por $facultad y $tipo";

                $dbuser = "admin_sql";
                $dbpassword = "Zaq1xsw2";

                $conn = new PDO("mysql:host=localhost; dbname=practica_3", $dbuser, $dbpassword);
                
                $dbuser = "";
                $dbpassword = "";

                $sentencia = "SELECT nombre, facultad, fecha_inicio as inicio, fecha_finalizacion as final FROM carreras WHERE facultad = :facultad && tipo = :tipo;";

                $consultaSQL = $conn->prepare($sentencia);
                $consultaSQL->execute(array(
                    ':facultad' => $facultad,
                    ':tipo' => $tipo,
                ));

                ?>

        <table border="1">
                    <tr>
                        <th>
                            Nombre
                        </th>   

                        <th>
                            Facultad
                        </th>   

                        <th>
                            Fecha de inicio del curso
                        </th>
                        
                        <th>
                            Fecha de finalizacion del curso
                        </th>
            </tr>
            
            <?php
                while ($row = $consultaSQL->fetch(PDO::FETCH_ASSOC)) {
                    ?>            
            <tr>
                <td><?php echo $row["nombre"] ?></td>
                <td><?php echo $row["facultad"] ?></td>
                <td><?php echo $row["inicio"] ?></td>
                <td><?php echo $row["final"] ?></td>
            </tr>
            <?php

                }    
            }
        ?>
        </table>

    </body>
    </div>
</html>