<?php
include("conexion.php");

$mensaje = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // ENCRIPTAR
    $hash = password_hash($contrasena, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios(usuario, contrasena) VALUES (?, ?)";

    $statement = $conexion->prepare($sql);
    $statement->bind_param("ss", $usuario, $hash);

    if($statement->execute()){

        $mensaje = "Usuario registrado";

    }else{

        $mensaje = "Error";

    }
}
?>
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
   body{
    background-image: url("img/e.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;

    display: flex;
    justify-content: center;
    align-items: center;
}

/* Caja Login */
.form-box{
    width: 400px;
    padding: 40px;
    border-radius: 20px;
    background: rgba(25,25,25,0.85);
    backdrop-filter: blur(12px);
    box-shadow: 0 10px 40px rgba(0,0,0,.4);
    border: 1px solid rgba(87,237,255,.3);
}

/* Título */
.form-box h2{
    color: #57edff;
    text-align: center;
    margin-bottom: 30px;
    font-weight: bold;
}

/* Inputs */
.input-group-text{
    background: #57edff;
    color: #111;
    border: none;
}

.form-control{
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(87,237,255,.4);
    color: white;
    height: 50px;
}

.form-control::placeholder{
    color: rgba(255,255,255,.7);
}

.form-control:focus{
    background: rgba(255,255,255,.12);
    color: white;
    border-color: #57edff;
    box-shadow: 0 0 15px rgba(87,237,255,.3);
}

/* Botón */
.btn-custom{
    width: 100%;
    height: 50px;
    border: none;
    border-radius: 12px;
    font-weight: bold;
    background: linear-gradient(135deg,#57edff,#00bcd4);
    color: #111;
}

.btn-custom:hover{
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(87,237,255,.4);
}


/* Ojo */
.ojo{
    background: transparent ;
    border: none ;
}

/* Link */
.mensaje a{
    color:#57edff;
    text-decoration:none;
}

.mensaje a:hover{
    color:white;
}
</style>

<div class="form-box">

    <h2>
        <i class="bi bi-box-arrow-in-right"></i> Registrarme
    </h2>

    <?php if($mensaje != ""): ?>
        <div class="alert alert-danger">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="mb-3 input-group">

            <span class="input-group-text">
                <i class="bi bi-person-fill"></i>
            </span>

            <input type="text"
                   class="form-control"
                   name="usuario"
                   placeholder="Usuario"
                   required>

        </div>

        <div class="mb-3 input-group">

            <span class="input-group-text">
                <i class="bi bi-lock-fill"></i>
            </span>

            <input type="password"
                   class="form-control"
                   id="contrasena"
                   name="contrasena"
                   placeholder="Contraseña"
                   required>

            
        </div>

        <button type="submit" class="btn btn-custom">
            <i class="bi bi-box-arrow-in-right"></i> Registrar
        </button>

        <div class="mensaje mt-3">
            <a href="login.php">
                <i class="bi bi-card-list"></i> iniciar sesion
            </a>
        </div>

    </form>

</div>