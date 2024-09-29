<?php
session_start();
/* Comprobamos si el usuario tiene sesión iniciada */
if (!isset($_SESSION['usuario']) && !is_array($_SESSION['usuario'])) {
    $_SESSION['alerta'] = [
        'clase' => 'alert-warning',
        'contenido' => 'Su sesión ha finalizado, inicie sesión nuevamente',
    ];
    header('Location: login.php');
    die();
}
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Aplicación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
</head>

<body style="padding-top: 2rem;">
    <div class="container">
        <h1>Interior de la aplicación</h1>
        <p class="lead">¡Bienvenido <?= htmlspecialchars($_SESSION['usuario']['nombre']) ?>!</p>
        <p class="small"><a href="logout.php">Cerrar sesión</a></p>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>
