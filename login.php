<?php
session_start();
include("conexion.php");

$mensaje = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Buscar usuario
    $sql = "SELECT * FROM usuarios WHERE usuario = ?";

    $statement = $conexion->prepare($sql);
    $statement->bind_param("s", $usuario);
    $statement->execute();

    $resultado = $statement->get_result();

    if($resultado->num_rows > 0){

        $fila = $resultado->fetch_assoc();

        // Verificar contraseña encriptada
        if(password_verify($contrasena, $fila['contrasena'])){

            $_SESSION['usuario'] = $usuario;

            header("Location: plantilla.php");
            exit();

        }else{

            $mensaje = "Usuario o contraseña incorrectos";

        }

    }else{

        $mensaje = "Usuario o contraseña incorrectos";

    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<script>
const togglePassword = document.querySelector(".toggle-password");
const password = document.querySelector("#contrasena");

togglePassword.addEventListener("click", () => {

    if(password.type === "password"){
        password.type = "text";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
    } else {
        password.type = "password";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
    }

});
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<body>
    <style>
  body{
    background-image: url("img/si.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.login-card{
    width: 450px;
    border-radius: 25px;
    backdrop-filter: blur(10px);
    background: rgba(255,255,255,.92);
}

h2{
    color:#2e6d7c;
    font-weight:bold;
}

.form-control{
    height:55px;
    border-radius:15px;
    border:2px solid #4AA8D8;
}

.form-control:focus{
    border-color:#D6338F;
    box-shadow:0 0 10px rgba(214,51,143,.25);
}

.input-icon{
    position:absolute;
    left:18px;
    top:50%;
    transform:translateY(-50%);
    color:#4AA8D8;
    z-index:10;
}

.toggle-password{
    position:absolute;
    right:18px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    color:#D6338F;
    z-index:10;
}

.btn-login{
    background:linear-gradient(135deg,#4FB6A1,#4AA8D8);
    color:white;
    border:none;
    height:55px;
    border-radius:15px;
    font-weight:bold;
}

.btn-login:hover{
    background:linear-gradient(135deg,#4AA8D8,#D6338F);
    color:white;
}
</style>

<body>

<div class="container min-vh-100 d-flex justify-content-center align-items-center">

    <div class="card shadow-lg border-0 login-card">

        <div class="card-body p-5">

            <h2 class="text-center mb-4">Iniciar Sesión</h2>

            <?php if($mensaje != ""): ?>
                <div class="alert alert-danger">
                    <?php echo $mensaje; ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3 position-relative">

                    <i class="fas fa-user input-icon"></i>

                    <input type="text"
                           name="usuario"
                           class="form-control ps-5"
                           placeholder="Usuario"
                           required>

                </div>

                <div class="mb-4 position-relative">

                    <i class="fas fa-lock input-icon"></i>

                    <input type="password"
                           id="contrasena"
                           name="contrasena"
                           class="form-control ps-5 pe-5"
                           placeholder="Contraseña"
                           required>

                    

                </div>

                <button type="submit" class="btn btn-login w-100">
                    Iniciar Sesión
                </button>

                <div class="text-center mt-3">
                    <a href="registros.php">📝 Registrarme</a>
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>