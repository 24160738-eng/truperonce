<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herramientas Profesionales</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; color: #333; }

        /* NAV */
        nav {
            background: #c0392b;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        nav .logo { color: white; font-size: 28px; font-weight: bold; }
        nav ul { list-style: none; display: flex; gap: 25px; }
        nav ul li a { color: white; text-decoration: none; font-size: 16px; }
        nav ul li a:hover { text-decoration: underline; }

        /* HERO */
        #inicio {
            background: linear-gradient(135deg, #c0392b, #922b21);
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        #inicio h1 { font-size: 48px; margin-bottom: 15px; }
        #inicio p { font-size: 20px; margin-bottom: 30px; }
        #inicio a {
            background: white;
            color: #c0392b;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }

        /* PRODUCTOS */
        #productos {
            padding: 60px 40px;
            background: #f9f9f9;
            text-align: center;
        }
        #productos h2 { font-size: 36px; margin-bottom: 10px; color: #c0392b; }
        #productos p { margin-bottom: 40px; color: #666; }
        .productos-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            max-width: 900px;
            margin: 0 auto;
        }
        .producto-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .producto-card h3 { color: #c0392b; margin-bottom: 8px; }

        /* MISIÓN/VISIÓN */
        #mision {
            padding: 60px 40px;
            background: white;
            text-align: center;
        }
        #mision h2 { font-size: 36px; color: #c0392b; margin-bottom: 40px; }
        .mv-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            max-width: 800px;
            margin: 0 auto;
        }
        .mv-card {
            background: #f0f0f0;
            border-radius: 8px;
            padding: 30px;
        }
        .mv-card h3 { color: #c0392b; margin-bottom: 10px; }

        /* FOOTER */
        footer {
            background: #1a1a1a;
            color: #ccc;
            text-align: center;
            padding: 30px;
        }
        footer a {
            color: #c0392b;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
            padding: 8px 20px;
            border: 2px solid #c0392b;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<nav>
    <div class="logo">🔧 TRUPER</div>
    <ul>
        <li><a href="#inicio">Inicio</a></li>
        <li><a href="#productos">Productos</a></li>
        <li><a href="#mision">Misión/Visión</a></li>
        <li><a href="login.php">Acceso Admin</a></li>
    </ul>
</nav>

<section id="inicio">
    <h1> Herramientas Profesionales</h1>
    <p>Calidad y durabilidad para cada trabajo. Marca líder en México.</p>
    <a href="#productos">Ver Catálogo</a>
</section>

<section id="productos">
    <h2>Nuestros Productos</h2>
    <p>Contamos con herramientas para cada necesidad</p>
    <div class="productos-grid">
        <div class="producto-card">
            <h3>🔨 Percusión</h3>
            <p>Martillos, mazos y punzones de alta resistencia.</p>
        </div>
        <div class="producto-card">
            <h3>🔧 Llaves</h3>
            <p>Llaves españolas, ajustables, stillson y dados.</p>
        </div>
        <div class="producto-card">
            <h3>⚡ Eléctricas</h3>
            <p>Taladros, esmeriladora y sierras eléctricas.</p>
        </div>
        <div class="producto-card">
            <h3>✂️ Corte</h3>
            <p>Seguetas, navajas, tijeras y sierras de corte.</p>
        </div>
        <div class="producto-card">
            <h3>🌿 Jardín</h3>
            <p>Palas, rastrillos, mangueras y podadoras.</p>
        </div>
        <div class="producto-card">
            <h3>🎨 Pintura</h3>
            <p>Brochas, rodillos, espátulas y charolas.</p>
        </div>
    </div>
</section>

<section id="mision">
    <h2>Misión y Visión</h2>
    <div class="mv-grid">
        <div class="mv-card">
            <h3>🎯 Misión</h3>
            <p>Proveer herramientas de alta calidad que satisfagan las necesidades de profesionales y aficionados, contribuyendo al desarrollo productivo de México.</p>
        </div>
        <div class="mv-card">
            <h3>🚀 Visión</h3>
            <p>Ser la marca de herramientas número uno en Latinoamérica, reconocida por su innovación, durabilidad y compromiso con el cliente.</p>
        </div>
    </div>
</section>

<footer>
    <p>© 2026 Truper S.A. de C.V. - Todos los derechos reservados</p>
    <p style="margin-top:8px;">Equipo 11 - Taller de Sistemas Operativos</p>
    <a href="login.php">Panel Administrativo</a>
</footer>

</body>
</html>
