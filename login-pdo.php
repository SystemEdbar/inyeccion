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
try {
    $conexión = new \PDO(
        "mysql:dbname={$mysql['basededatos']};host={$mysql['host']};charset=utf8",
        $mysql['usuario'],
        $mysql['contraseña']
    );
    $conexión->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    header('Content-Type: text/plain');
    die("ERROR DE CONEXIÓN: " . $e->getMessage());
}

/* Precargamos las variables del formulario (completamente opcional) */
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

/* Realizamos la consulta SQL */
try {
    /* Preparamos la consulta. PDO no soporta variables con caracteres no ASCII */
    $consulta = $conexión->prepare('
        SELECT *
        FROM usuarios
        WHERE usuario = :usuario AND contraseña = :contrasena
    ');
    /* Asociamos los valores a los entregados en el formulario */
    $consulta->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
    $consulta->bindValue(':contrasena', $contraseña, \PDO::PARAM_STR);
    /* Ejecutamos la consulta */
    $consulta->execute();
    /* Obtenemos el primer registro (si existe) */
    $datos = $consulta->fetch();
    /* Si no se reciben resultados es porque no existe el usuario con la contraseña proporcionada */
    if ($datos === false) {
        $_SESSION['alerta'] = [
            'clase' => 'alert-danger',
            'contenido' => 'Usuario o contraseña incorrecta',
        ];
        header('Location: login.php');
        die();
    }
} catch (\PDOException $e) {
    header('Content-Type: text/plain');
    die("ERROR DE CONEXIÓN: " . $e->getMessage());
}

/* Guardamos los datos obtenidos de la base de datos en $_SESSION['usuario'] */
$_SESSION['usuario'] = $datos;

/* Redirigimos al usuario a la aplicación si todo fue bien */
header('Location: aplicacion.php');
