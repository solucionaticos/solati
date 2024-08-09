<?php
require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

session_start();
if (isset($_SESSION['authenticated'])) {
    header('Location: /'.$_ENV['PROJECT_PATH'].'/index.php');
    exit;
}

require_once __DIR__.'/../src/Auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (Auth::authenticate($username, $password)) {
        $_SESSION['authenticated'] = true;
        header('Location: /'.$_ENV['PROJECT_PATH'].'/index.php');
        exit;
    } else {
        $error = 'Credenciales Inválidas';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container">

        <h1>Ingresar</h1>
        <form method="POST">

            <div class="container">
                <label for="username"><b>Usuario</b></label>
                <input type="text" placeholder="Ingresa tu usuario" name="username" required>

                <label for="password"><b>Contraseña</b></label>
                <input type="password" placeholder="Ingresa tu contraseña" name="password" required>

                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>

        </form>
        <?php if (isset($error)) {
            echo "<p class='text-danger mt-2'>$error</p>";
        } ?>

    </div>

</body>
</html>