<?php
/* Si existe una versión local fuera del sitio web, la usamos */
if (file_exists('../config.php')) {
    require_once '../config.php';
} else {
    /* Configurar aquí los datos de acceso a la base de datos MySQL */
    $mysql = [
      'host' => 'localhost',
      'usuario' => 'root',
      'contraseña' => '',
      'basededatos' => 'basededatos',
    ];
}
