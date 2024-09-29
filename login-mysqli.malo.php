<?php
require_once 'config.php';
session_start();

/* Si no se han mandado los campos necesarios enviamos al formulario */
if (empty($_POST['usuario']) || empty($_POST['contraseña'])) {
    $_SESSION['alerta'] = [
        'clase' => 'alert-warning',
        'contenido' => 'Introduzca nombre de usuario y contraseña',
    ];
    header('Location: login.php');
    die();
}

/* Establecemos la conexión a la base de datos */
$conexión = @new \mysqli(
   $mysql['host'],
   $mysql['usuario'],
   $mysql['contraseña'],
   $mysql['basededatos']
);

/* En caso de error mostramos el mensaje */
if ($conexión->connect_error !== NULL) {
    header('Content-Type: text/plain');
    die("ERROR DE CONEXIÓN: " . $conexión->connect_error);
}

if ($conexión->set_charset('utf8') === false) {
    header('Content-Type: text/plain');
    die("ERROR JUEGO DE CARACTERES: " . $conexión->error);
}

/* Precargamos las variables del formulario (completamente opcional) */
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

/* Realizamos la consulta SQL */
$consulta = $conexión->query("
    SELECT *
    FROM usuarios
    WHERE usuario = '{$usuario}' AND contraseña = '{$contraseña}'
");

/* En caso de error mostramos el mensaje */
if ($consulta === false) {
    header('Content-Type: text/plain');
    die("ERROR SQL: " . $conexión->error);
}

/* Obtenemos el primer registro (si existe) */
$datos = $consulta->fetch_assoc();

/* Si no se reciben resultados es porque no existe el usuario con la contraseña proporcionada */
if ($datos === NULL) {
    $_SESSION['alerta'] = [
        'clase' => 'alert-danger',
        'contenido' => 'Usuario o contraseña incorrecta',
    ];
    header('Location: login.php');
    die();
}

/* Guardamos los datos obtenidos de la base de datos en $_SESSION['usuario'] */
$_SESSION['usuario'] = $datos;

/* Redirigimos al usuario a la aplicación si todo fue bien */
header('Location: aplicacion.php');
