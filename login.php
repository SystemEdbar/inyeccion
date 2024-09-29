<?php
session_start();
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Entrada a la aplicación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
</head>

<body style="padding-top: 3rem;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-1">
                <h1 class="text-center login-title">Entrada al sistema (PDO malo)</h1>
                <div class="account-wall">
                    <form class="form-signin" method="post" action="login-pdo.malo.php">
                        <input name="usuario" type="text" class="form-control" placeholder="Usuario" required autofocus>
                        <input name="contraseña" type="password" class="form-control" placeholder="Contraseña" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                        <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Recordarme
                </label>
                        <a href="#" class="pull-right need-help">¿Necesita ayuda?</a><span class="clearfix"></span>
                    </form>
                </div>
                <a href="#" class="text-center new-account">Crear una cuenta</a>
            </div>
            <div class="col-sm-6 col-md-4 col-md-offset-1">
                <h1 class="text-center login-title">Entrada al sistema (mysqli malo)</h1>
                <div class="account-wall">
                    <form class="form-signin" method="post" action="login-mysqli.malo.php">
                        <input name="usuario" type="text" class="form-control" placeholder="Usuario" required autofocus>
                        <input name="contraseña" type="password" class="form-control" placeholder="Contraseña" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                        <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Recordarme
                </label>
                        <a href="#" class="pull-right need-help">¿Necesita ayuda?</a><span class="clearfix"></span>
                    </form>
                </div>
                <a href="#" class="text-center new-account">Crear una cuenta</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-1">
                <h1 class="text-center login-title">Entrada al sistema (PDO)</h1>
                <div class="account-wall">
                    <form class="form-signin" method="post" action="login-pdo.php">
                        <input name="usuario" type="text" class="form-control" placeholder="Usuario" required autofocus>
                        <input name="contraseña" type="password" class="form-control" placeholder="Contraseña" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                        <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Recordarme
                </label>
                        <a href="#" class="pull-right need-help">¿Necesita ayuda?</a><span class="clearfix"></span>
                    </form>
                </div>
                <a href="#" class="text-center new-account">Crear una cuenta</a>
            </div>
            <div class="col-sm-6 col-md-4 col-md-offset-1">
                <h1 class="text-center login-title">Entrada al sistema (mysqli)</h1>
                <div class="account-wall">
                    <form class="form-signin" method="post" action="login-mysqli.php">
                        <input name="usuario" type="text" class="form-control" placeholder="Usuario" required autofocus>
                        <input name="contraseña" type="password" class="form-control" placeholder="Contraseña" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                        <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Recordarme
                </label>
                        <a href="#" class="pull-right need-help">¿Necesita ayuda?</a><span class="clearfix"></span>
                    </form>
                </div>
                <a href="#" class="text-center new-account">Crear una cuenta</a>
            </div>
        </div>
<?php
if (isset($_SESSION['alerta'])) {
?>        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3">
                <div class="alert <?= $_SESSION['alerta']['clase'] ?> text-center"><?= $_SESSION['alerta']['contenido'] ?></div>
            </div>
        </div>
    </div>
<?php
    unset($_SESSION['alerta']);
}
?>    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>
