<?php
    include '../db/conexion.php';       
    session_start();
    if(!isset($_SESSION['logueado'])){
    header("Location: ../index.php");
    }
    $id=$_GET['id_producto'];
    $sql = $conexion->query("SELECT * FROM productos WHERE id_producto=$id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="../css/style.css"> 
    <title>Modificar</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a href="../index.php" class="navbar-brand"><span class="text-primary">Tito's</span>Restobar</a>
		<button class="navbar-toggler" type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarS"
			aria-controls="navbarS"
			aria-expanded="false"
			aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarS">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a href="../index.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="admin.php" class="nav-link">Admin</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Clientes</a>
				</li>
				<li class="nav-item">
					<a href="profile.php" class="nav-link">Perfil</a>
				</li>
			</ul>
		</div>
	</div>
	</nav>
    <div class="container-fluid row p-3 ms-3">
        <form class="col-4 p-3 ms-auto" action="../controller/modificarProd-control.php" method="post">
            <h3 class="text-center alert text-secondary">Modificar Producto</h3>
            <div class="mb-3">
                <input type="hidden" name="id_producto" value="<?=$_GET['id_producto']?>">
            </div>
            <?php
            while($datos=$sql->fetch_object()){?>
            <div class="mb-3">
                <input type="text" class="form-control" name="nombre" value="<?=$datos->nombre?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="descripcion" value="<?=$datos->descripcion?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="costo" value="<?=$datos->costo?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="precio" value="<?=$datos->precio?>">
            </div>
            <?php }
            ?>
            <button class="btn btn-primary" type="submit" name="btnModificar">Modificar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>