<html>
<head>
    <title>Información de usuario</title>
</head>
<body>
    <?php
        if(isset($_POST['usuario']) && isset($_POST['clave'])){
            $usuario = $_GET['usuario'];
            $clave = $_GET['clave'];
            if($usuario != ''){
                echo "Por favor ingrese los datos correctamente";
    
             }else{
                echo "Datos ingresados correctamente";
            }
        }    
            
    ?>
    <h1>Ingrese sus datos personales.</h1>
    <form action= "/">

        usuario<input type="text" name="usuario"><br>
        Password<input type="password" name="password" /><br />
        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" required><br>
        <label>Género:</label>
        <input type="radio" id="masculino" name="genero" value="masculino" required>
        <label for="masculino">Masculino</label>

        <input type="radio" id="femenino" name="genero" value="femenino" required>
        <label for="femenino">Femenino</label><br>
        <input type="submit" value="login" />
    </form>

</body>
</html>