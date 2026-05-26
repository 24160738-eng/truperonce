<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $pass    = $_POST['password'];

    // Aquí sustituye tunumcontrol por tu número de control real
    if ($usuario === '24160738@itoaxaca.edu.mx' && $pass === '24160738TSO') {
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Truper Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #c0392b, #922b21);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            width: 380px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            text-align: center;
        }
        .card h2 { color: #c0392b; margin-bottom: 5px; }
        .card p { color: #666; margin-bottom: 25px; font-size: 14px; }
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 15px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #c0392b;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover { background: #922b21; }
        .error {
            background: #fdecea;
            color: #c0392b;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        a { display: block; margin-top: 15px; color: #c0392b; font-size: 14px; }
    </style>
</head>
<body>
<div class="card">
    <h2>🔧 TRUPER</h2>
    <p>Panel Administrativo - Equipo 11</p>

    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <input type="text"     name="usuario"  placeholder="Correo institucional" id="u">
    <input type="password" name="password" placeholder="Contraseña"           id="p">
    <button onclick="enviar()">Iniciar Sesión</button>
    <a href="index.php">← Volver al inicio</a>
</div>

<script>
function enviar() {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'login.php';

    const u = document.createElement('input');
    u.name = 'usuario'; u.value = document.getElementById('u').value;
    const p = document.createElement('input');
    p.name = 'password'; p.value = document.getElementById('p').value;

    form.appendChild(u);
    form.appendChild(p);
    document.body.appendChild(form);
    form.submit();
}
</script>
</body>
</html>
