<?php
session_start();

// Contador de actualizaciones
if (!isset($_SESSION['update_counter'])) {
    $_SESSION['update_counter'] = 0;
}
$_SESSION['update_counter']++;

if ($_SESSION['update_counter'] > 15) {
    session_destroy();
    session_start();
    $_SESSION['update_counter'] = 1;
}

// Timer de inactividad
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    session_unset();
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Inicio de Sesión y Registro</title>
</head>
<body>
    <h1>Bienvenido a la Biblioteca Virtual</h1>
    <p>Contador de actualizaciones: <?php echo $_SESSION['update_counter']; ?></p>
    
    <h2>Inicio de Sesión</h2>
    <form action="login.php" method="POST">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>

    <h2>Registro de Usuario</h2>
    <form action="register.php" method="POST" enctype="multipart/form-data">
        <label for="full_name">Nombre Completo:</label>
        <input type="text" id="full_name" name="full_name" required>
        <br>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br>
        <label for="user_type">Tipo de Usuario:</label>
        <select id="user_type" name="user_type" required>
            <option value="cliente">Cliente</option>
            <option value="administrador">Administrador</option>
        </select>
        <br>
        <label for="address">Dirección:</label>
        <textarea id="address" name="address" required></textarea>
        <br>
        <label for="phone">Teléfono:</label>
        <input type="text" id="phone" name="phone" required>
        <br>
        <label for="birthdate">Fecha de Nacimiento:</label>
        <input type="date" id="birthdate" name="birthdate" required>
        <br>
        <label for="profile_picture">Foto de Perfil:</label>
        <input type="file" id="profile_picture" name="profile_picture">
        <br>
        <label for="terms">Aceptar Términos y Condiciones:</label>
        <input type="checkbox" id="terms" name="terms" required>
        <br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>