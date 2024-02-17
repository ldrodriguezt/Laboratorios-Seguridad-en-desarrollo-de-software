<html>
<head>
    <title>Información de usuario</title>
</head>
<body>
    <?php
        if(isset($_POST['usuario']) && isset($_POST['clave'])){
            $usuario = $_GET['usuario'];
            $clave = $_GET['clave'];
            if($usuario != null){
                
            }
        }    
            
        
    ?>
    <h1>Ingrese sus datos personales.</h1>
    <form action= "/">

        usuario<input type="text" name="usuario"><br>
        Password<input type="password" name="password" /><br />
        <input type="submit" value="login" />
    </form>

</body>
</html>