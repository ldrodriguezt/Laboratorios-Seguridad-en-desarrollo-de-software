<head>
    <title>Inicio</title>
    <style>
        .boton {
            display: block;
            width: 200px;
            height: 60px;
            background-color: #6199be;
            color: white;
            font-size: 18px;
            text-align: center;
            line-height: 60px;
            border: none;
            border-radius: 10px;
            margin: 20px auto;
            cursor: pointer;
        }

        .container {
        width: 50%; 
        margin: 0 auto; 
        }
    </style>
</head>
<body>
    <div class="container">  
        <center>
            <h1> Menú de opciones Tecnologías globales.</h1>
        </center>
        <hr>
        <button class="boton" onclick="window.location.href='pqrsf.php'">Crear una PQRSF</button>
        <button class="boton" onclick="window.location.href='servicios.php'">Solicitar un servicio</button>
        <hr>    
    </div>
    
    <button class="boton" onclick="window.location.href='inicio_sesion.php'">Cerrar sesión</button>
</body>