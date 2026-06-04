<?php

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "oficina");

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta SQL
$sql = "SELECT * FROM clientes";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si la consulta falló
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
   body { 
    background-color: #f4f8fb;
    color: #607476;
    background-image: url("img/w.jpg");
    background-size: cover;       /* hace que cubra toda la pantalla */
    background-position: center;   /* centra la imagen */
    background-repeat: no-repeat; /* evita que se repita */
    background-attachment: fixed; /* opcional: efecto parallax */
    
    background-color: #f4f8fb; /* color de respaldo */
    color: #607476;
  

}

/* TABLA */
.table-custom{
  
    border-top: 4px solid #57edff;
}

/* TITULOS */
h2{
    color: #ffffff;
    border-left: 5px solid #ffffff;
}

/* ENCABEZADOS */
th{
    background: linear-gradient(45deg, #57edff, #00bcd4);
    color: #111;
}

/* FILAS */
td{
    color: #f3f4f6;
    border-bottom: 1px solid rgba(87,237,255,0.15);
}

/* EFECTO HOVER */
tr:hover{
    background-color: rgba(87,237,255,0.12);

}
div {
    margin-top: 50px;
    padding-top: 10px;
    padding-bottom: 50px; /* espacio al final */
}

        
    </style>
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4 text-center">
        Lista de Problemas Registrados
    </h2>

    <div class="table-responsive table-custom">

        <table class="table table-bordered table-hover align-middle mb-0">

            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Descripción</th>
                    <th>Tipo de problema</th>
                </tr>
            </thead>

            <tbody>

            <?php
            // Verificar si hay resultados
            if(mysqli_num_rows($resultado) > 0){

                while($fila = mysqli_fetch_assoc($resultado)){
            ?>

                <tr>
                    <td><?php echo htmlspecialchars($fila['id']); ?></td>

                    <td>
                        <?php echo htmlspecialchars($fila['nombre']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($fila['departamento']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($fila['descripcion']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($fila['tipo_problema']); ?>
                    </td>
                </tr>

            <?php
                }

            }else{
            ?>

                <tr>
                    <td colspan="5" class="text-center text-muted">
                        No hay problemas registrados
                    </td>
                </tr>

            <?php
            }
            ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>