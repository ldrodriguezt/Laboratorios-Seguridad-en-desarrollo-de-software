<html>

    <style>
        .container {
            width: 50%; 
            margin: 0 auto; 
         }
    </style>

    <head>
        <title> Busqueda de estudiantes por fecha de nacimiento </title>
    </head>


    <div class="container">
    <body>
        <h1> Busqueda de estudiantes por fecha de nacimiento </h1>

        <form action = "" method = GET>
            Ingrese la fecha de nacimiento a consultar: 
            <input type ="date" name = "fecha_nacimiento">

            <input type ="submit" value= "Buscar">
        </form>

        <?php
            if(isset($_GET["fecha_nacimiento"])){
                $fecha_nacimiento = $_GET["fecha_nacimiento"];
                echo "Busqueda por $fecha_nacimiento";

                $dbuser = "admin_sql";
                $dbpassword = "Zaq1xsw2";

                $conn = new PDO("mysql:host=localhost; dbname=practica_3", $dbuser, $dbpassword);
                
                $dbuser = "";
                $dbpassword = "";

                $consultaSQL = $conn->prepare("SELECT nombre, apellido, documento as identificacion, cuidad as ciudad FROM estudiantes WHERE fecha_nacimiento = '$fecha_nacimiento'");
                $consultaSQL->execute();

                ?>

        <table border="1">
                    <tr>
                        <th>
                            Nombre
                        </th>   

                        <th>
                            Apellido
                        </th>   

                        <th>
                            Identificación
                        </th>
                        
                        <th>
                            Ciudad
                        </th>
            </tr>
            
            <?php
                while ($row = $consultaSQL->fetch(PDO::FETCH_ASSOC)) {
                    ?>            
            <tr>
                <td><?php echo $row["nombre"] ?></td>
                <td><?php echo $row["apellido"] ?></td>
                <td><?php echo $row["identificacion"] ?></td>
                <td><?php echo $row["ciudad"] ?></td>
            </tr>
            <?php

                }    
            }
        ?>
        </table>

    </body>
    </div>
</html>