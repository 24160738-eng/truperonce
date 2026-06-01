<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require 'db.php';

$msg = '';

// CREATE
if (isset($_POST['action']) && $_POST['action'] === 'create') {
    $n  = $conn->real_escape_string($_POST['nombre']);
    $c  = $conn->real_escape_string($_POST['categoria']);
    $m  = $conn->real_escape_string($_POST['marca']);
    $pr = $conn->real_escape_string($_POST['precio']);
    $s  = $conn->real_escape_string($_POST['stock']);
    $conn->query("INSERT INTO herramientas (nombre,categoria,marca,precio,stock) VALUES ('$n','$c','$m','$pr','$s')");
    $msg = '✅ Herramienta registrada correctamente.';
}

// UPDATE
if (isset($_POST['action']) && $_POST['action'] === 'update') {
    $id = (int)$_POST['id'];
    $n  = $conn->real_escape_string($_POST['nombre']);
    $c  = $conn->real_escape_string($_POST['categoria']);
    $m  = $conn->real_escape_string($_POST['marca']);
    $pr = $conn->real_escape_string($_POST['precio']);
    $s  = $conn->real_escape_string($_POST['stock']);
    $conn->query("UPDATE herramientas SET nombre='$n',categoria='$c',marca='$m',precio='$pr',stock='$s' WHERE id=$id");
    $msg = '✅ Herramienta actualizada correctamente.';
}

// DELETE
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM herramientas WHERE id=$id");
    $msg = '🗑️ Herramienta eliminada.';
}

// Cargar para editar
$editData = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $res = $conn->query("SELECT * FROM herramientas WHERE id=$id");
    $editData = $res->fetch_assoc();
}

// READ
$result = $conn->query("SELECT * FROM herramientas ORDER BY id");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin - Truper</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        header {
            background: #c0392b;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 { font-size: 22px; }
        header a { color: white; text-decoration: none; font-size: 14px; border: 1px solid white; padding: 6px 14px; border-radius: 4px; }
        .container { max-width: 1100px; margin: 30px auto; padding: 0 20px; }
        .msg { background: #d4edda; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 20px; }
        .card { background: white; border-radius: 8px; padding: 25px; margin-bottom: 25px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        .card h2 { color: #c0392b; margin-bottom: 20px; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        input, select {
            width: 100%; padding: 10px;
            border: 1px solid #ddd; border-radius: 4px; font-size: 14px;
        }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; }
        .btn-red   { background: #c0392b; color: white; margin-top: 10px; }
        .btn-blue  { background: #2980b9; color: white; margin-top: 10px; }
        .btn-red:hover  { background: #922b21; }
        .btn-blue:hover { background: #1f618d; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th { background: #c0392b; color: white; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #eee; text-align: center; }
        tr:hover { background: #fdf2f2; }
        .btn-sm { padding: 5px 12px; border: none; border-radius: 3px; cursor: pointer; font-size: 13px; }
        .btn-edit { background: #f39c12; color: white; }
        .btn-del  { background: #c0392b; color: white; }
    </style>
</head>
<body>

<header>
    <h1>🔧 Truper - Panel Administrativo | Yael Muñoz </h1>
    <a href="logout.php">Cerrar Sesión</a>
</header>

<div class="container">

    <?php if ($msg): ?>
        <div class="msg"><?= $msg ?></div>
    <?php endif; ?>

    <!-- FORMULARIO CREATE / UPDATE -->
    <div class="card">
        <h2><?= $editData ? '✏️ Editar Herramienta' : '➕ Nueva Herramienta' ?></h2>
        <form method="POST">
            <input type="hidden" name="action" value="<?= $editData ? 'update' : 'create' ?>">
            <?php if ($editData): ?>
                <input type="hidden" name="id" value="<?= $editData['id'] ?>">
            <?php endif; ?>
            <div class="form-grid">
                <input type="text"   name="nombre"    placeholder="Nombre"    value="<?= $editData['nombre']    ?? '' ?>" required>
                <input type="text"   name="categoria" placeholder="Categoría" value="<?= $editData['categoria'] ?? '' ?>" required>
                <input type="text"   name="marca"     placeholder="Marca"     value="<?= $editData['marca']     ?? '' ?>" required>
                <input type="number" name="precio"    placeholder="Precio"    value="<?= $editData['precio']    ?? '' ?>" step="0.01" required>
                <input type="number" name="stock"     placeholder="Stock"     value="<?= $editData['stock']     ?? '' ?>" required>
            </div>
            <button type="submit" class="btn <?= $editData ? 'btn-blue' : 'btn-red' ?>">
                <?= $editData ? '💾 Actualizar' : '➕ Guardar' ?>
            </button>
            <?php if ($editData): ?>
                <a href="admin.php" class="btn btn-red" style="display:inline-block;margin-left:10px;text-decoration:none;">Cancelar</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- TABLA READ -->
    <div class="card">
        <h2>📋 Inventario de Herramientas (<?= $result->num_rows ?> registros)</h2>
        <table>
            <tr>
                <th>#</th><th>Nombre</th><th>Categoría</th><th>Marca</th><th>Precio</th><th>Stock</th><th>Acciones</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nombre']) ?></td>
                <td><?= htmlspecialchars($row['categoria']) ?></td>
                <td><?= htmlspecialchars($row['marca']) ?></td>
                <td>$<?= number_format($row['precio'], 2) ?></td>
                <td><?= $row['stock'] ?></td>
                <td>
                    <a href="admin.php?edit=<?= $row['id'] ?>" class="btn-sm btn-edit">✏️ Editar</a>
                    <button class="btn-sm btn-del"
                        onclick="if(confirm('¿Eliminar esta herramienta?')) window.location='admin.php?delete=<?= $row['id'] ?>'">
                        🗑️ Eliminar
                    </button>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</div>
</body>
</html>
