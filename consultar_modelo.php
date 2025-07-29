<?php
$conexion = new mysqli("localhost", "root", "", "mi_base_de_datos");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM modelo";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Modelos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef7ff;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h1 {
            text-align: center;
            color: #003366;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #aaa;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .volver {
            margin-top: 30px;
            text-align: center;
        }
        .volver a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .volver a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Consulta de Modelos</h1>

<?php if ($resultado && $resultado->num_rows > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo $fila["id"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["descripcion"]; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p style="text-align:center;">No hay modelos registrados.</p>
<?php endif; ?>

<div class="volver">
    <a href="consultas.html">← Volver a Consultas</a>
</div>

</body>
</html>

<?php
$conexion->close();
?>
