<html>

    <style>
        .container {
            width: 50%; 
            margin: 0 auto; 
         }
    </style>

    <head>
        <title> Busqueda de libros con filtros de ordenamiento. </title>
    </head>


    <div class="container">
    <body>
        <h1> Busqueda de libros con filtros de ordenamiento. </h1>
        <form action = "" method = GET>
            Ingrese el nombre de la facultad: 
            <select name="filtro" id="filtro">
                <option value="fecha_publicacion">Fecha de publicación</option>
                <option value="autor">Autor</option>
                <option value="nombre">Nombre</option>
                <option value="categoria">Categoría</option>
                <option value="presentacion">presentacion</option>
            </select>

            <input type ="submit" value= "Buscar">
        </form>
        <?php

                $dbuser = "admin_sql";
                $dbpassword = "Zaq1xsw2";

                $conn = new PDO("mysql:host=localhost; dbname=practica_3", $dbuser, $dbpassword);
                
                $dbuser = "";
                $dbpassword = "";

                $filtro = $_GET['filtro'];

                $consultaSQL = $conn->prepare("SELECT * FROM libros ORDER BY  $filtro ASC");


                $consultaSQL->execute();

                ?>

        <table border="1">
            <thead>
                    <tr>
                        <th>
                            Fecha
                        </th>   

                        <th>
                            Autor
                        </th>   

                        <th>
                            Nombre del libro
                        </th>
                        <th>
                            Categoria
                        </th>         
                        <th>
                            Presentación
                        </th>                        
               

            </tr>
            </thead>

            <?php
                while ($row = $consultaSQL->fetch(PDO::FETCH_ASSOC)) {
                    ?>            
            <tr>
                <td><?php echo $row["fecha_publicacion"] ?></td>
                <td><?php echo $row["autor"] ?></td>
                <td><?php echo $row["nombre"] ?></td>
                <td><?php echo $row["categoria"] ?></td>
                <td><?php echo $row["presentacion"] ?></td>
            </tr>
            <?php

                }    
            
        ?>
        </table>

    </body>
    </div>
</html>