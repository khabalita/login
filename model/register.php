<!DOCTYPE html>
<html lang="en">
<head>
        
        <meta charset="utf-8">
        
        <title> Formulario de Registro </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="../fontawesome/fontawesome-free-6.5.1-web/css/all.css">
		<link rel="stylesheet" href="../css/style.css">   

        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
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
					<a href="../login.html" class="nav-link">Login</a>
				</li>
				<li class="nav-item">
					<a href="register.php" class="nav-link">Sing in</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Contact</a>
				</li>
			</ul>
		</div>
	</div>
	</nav>
        <div class="container">
            <div class="title">
                <h2>Formulario de Registro</h2>
            </div>
            <form class="row g-3 m-4" action="../controller/register_control.php" method="post">
                <input class="col-12" type="text" name="nombre" id="nombre" placeholder="nombre" required><br>
                <input class="col-12" type="text" name="apellido" id="apellido" placeholder="apellido" required><br>
                <input class="col-12" type="text" name="email" id="email" placeholder="email" required><br>
                <input class="col-12" type="text" name="username" id="username" placeholder="username" required><br>
                <input class="col-12" type="password" name="password" id="password" placeholder="password" required><br>
                <button class="btn btn-primary" type="submit" title="Crear" name="crear">Registrarse</button>
            </form>
            <a href="../index.php">Volver</a>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>