<?php
    require_once '../db/conexion.php';
    session_start();
    if(!isset($_SESSION['logueado'])){
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="../css/style.css">    
    <title>Administrador</title>
</head>
<body>
    <script>
        function eliminar(){
            var respuesta = confirm("estas seguro que deseas eliminar el producto?");
            return respuesta;
        }
    </script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a href="index.php" class="navbar-brand"><span class="text-primary">Tito's</span>Restobar</a>
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
					<a href="profile.php" class="nav-link">Perfil</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Clientes</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link">Logout</a>
				</li>
			</ul>
		</div>
	</div>
	</nav>
    
    <div class="container-fluid row p-3">
        <h1 class="text-center mt-3 p-3">Gestion de Productos</h1>
    <?php
        include '../db/conexion.php';
        include '../controller/eliminarProd-control.php';
        include '../controller/ingresarProd-control.php';
    ?>
        <form class="col-4 p-3" action="../controller/ingresarProd-control.php" method="post">
            <h3 class="text-center text-secondary">Ingrese el produto</h3>
            <div class="mb-3">
                <input type="text" class="form-control" name="nombre" placeholder="nombre" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="descripcion" placeholder="descripcion" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="costo" placeholder="costo" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="precio" placeholder="precio" required>
            </div>
            <button class="btn btn-primary" type="submit" name="btnAgregar">Agregar Producto</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-warning">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nombre</th>
                        <th scope="col">descripcion</th>
                        <th scope="col">costo</th>
                        <th scope="col">precio</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../db/conexion.php';
                        $sql = $conexion->query("SELECT * FROM productos ");
                        while ($datos = $sql->fetch_object()){ ?>
                            <tr>
                                <td scope="row"><?=$datos->id_producto?></td>
                                <td scope="row"><?=$datos->nombre?></td>
                                <td scope="row"><?=$datos->descripcion?></td>
                                <td scope="row"><?=$datos->costo?></td>
                                <td scope="row"><?=$datos->precio?></td>
                                <td>
                                <a href="modificar.php?id_producto=<?=$datos->id_producto?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="admin.php?id<?=$datos->id_producto?>"class="btn btn-small btn-danger"><i class="fa-solid fa-delete-left"></i></a>
                                </td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>