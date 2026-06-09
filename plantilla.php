<?php

require_once "auth.php";

$usuario = validarJWT();

echo "Bienvenido " . $usuario->usuario;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo ?? "oficina"; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
  body { 
    background-color: #f4f8fb;
    color: #607476;
    background-image: url("img/flay.jpg"); 
    background-size: cover;       /* hace que cubra toda la pantalla */
    background-position: center;   /* centra la imagen */
    background-repeat: no-repeat; /* evita que se repita */
    background-attachment: fixed; /* opcional: efecto parallax */
    
    background-color: #f4f8fb; /* color de respaldo */
    color: #607476;
  
}
.mb-3 {
    margin-bottom: 30px;
    padding: 20px 30px;
}

/* Cajas de texto */
input,
select,
textarea {
    width: 100%;
    padding: 15px 18px;
    margin-top: 8px;
    margin-bottom: 20px;
    border-radius: 12px;
}


/* Etiquetas */
label {
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 600;
}

/* Tarjeta completa */
.card-body {
    padding: 35px;
}

/* NAVBAR */
.navbar-custom {
    background: linear-gradient(90deg, #4FB6A1, #4AA8D8);
    box-shadow: 0 6px 18px rgba(247, 247, 247, 0.84);
}

/* CARDS */
.card-custom {
    border-radius: 16px;
    box-shadow: 0 12px 28px rgba(0,0,0,0.15);
    border: 1px solid #4AA8D8;
    background-color: rgba(255,255,255,0.95);
    transition: all 0.25s ease;
}

.card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 35px rgba(0,0,0,0.2);
}

/* HEADER DE TARJETAS */
.card-header-custom {
    background: linear-gradient(90deg, #D6338F, #D6338F);
    color: white;
    font-weight: bold;
    letter-spacing: 0.8px;
}

/* BOTONES */
.btn-dark-custom {
    background: linear-gradient(90deg, #D6338F, #D6338F);
    color: white;
    border: none;
    font-weight: bold;
    border-radius: 10px;
    transition: all 0.2s ease;
}

.btn-dark-custom:hover {
    background: linear-gradient(90deg, #D6338F, #4AA8D8);
    transform: scale(1.04);
}

/* TITULOS */
h1, h2, h3, h4, h5 {
    color: #4FB6A1;
    font-weight: 700;
}

/* LINKS */
a {
    color: #4AA8D8;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
}

a:hover {
    color: #D6338F;
}

/* INPUTS */
input,
select,
textarea {
    border: 2px solid #4AA8D8;
    border-radius: 12px;
    transition: 0.2s;
    background-color: rgba(255,255,255,0.95);
}

input:focus,
select:focus,
textarea:focus {
    border-color: #D6338F;
    box-shadow: 0 0 0 4px rgba(214, 51, 143, 0.15);
    outline: none;
}

    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <img src="img/logo.png" width="200"> Registro
        </a>

        <a class="text-white me-4 text-decoration-none" href="plantilla.php">📝 Registro</a>
        <a class="text-white text-decoration-none" href="clientes.php">👥 Clientes</a>
        <a class="text-white text-decoration-none" href="registros.php">🔑 Registrarme</a>
        <a class="text-white text-decoration-none" href="login.php">  ℹ️ Iniciar sesion</a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card card-custom mb-4">
        <div class="card-header card-header-custom">
            Registrar problema
        </div>

        <form action="guardar_cliente.php" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre del Cliente" required>
                </div>

                <div class="col-md-4">
                    <input type="text" name="departamento" class="form-control mb-3" placeholder="Departamento" required>
                </div>

                <div class="col-md-4">
                    <input type="text" name="descripcion" class="form-control mb-3" placeholder="Descripción" required>
                </div>
            </div>

            <div class="col-md-4">
                <select name="tipo_problema" class="form-select mb-3" required>
                    <option value="" disabled selected>Selecciona tipo de problema</option>
                    <option value="impresoras">Impresoras</option>
                    <option value="mantenimiento">Mantenimiento</option>
                    <option value="Red">Red</option>
                    <option value="cpu">Computadoras/CPU</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <button class="btn btn-dark-custom w-100">💾 Guardar</button>
        </form>
    </div>

</div>

<!-- ✅ MODAL -->
<div class="modal fade" id="successModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">✔️ Registro exitoso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        El registro se guardo correctamente.
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>

    </div>
  </div>
</div>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get("ok") === "1") {
        const modal = new bootstrap.Modal(document.getElementById("successModal"));
        modal.show();

        // limpiar URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});
</script>

</body>
</html>