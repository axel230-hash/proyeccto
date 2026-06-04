<?php
$titulo = "Registro";
include("plantilla.php");
?>

<div class="card card-custom">

<div class="card-header card-header-custom">
📝 Registro Ciudadano
</div>

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
        <input type="text" name="tipo_problema" class="form-control mb-3" placeholder="Tipo de problema" required>
    </div>

    <button class="btn btn-dark-custom w-100">💾 Guardar</button>
</form>

</div>

</div>

<?php include("footer.php"); ?>