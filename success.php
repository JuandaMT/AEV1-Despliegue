<?php
session_start();
$palabra = $_SESSION['palabra'] ?? 'desconocida';
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>¡Has ganado!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        h1 {
            margin-top: 2rem;
        }

        a {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.6rem 1rem;
            background-color: #2e7d32;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #256628;
        }
    </style>
</head>

<body>
    <h1>🎉 ¡Enhorabuena, has ganado!</h1>
    <p>La palabra era: <strong><?php echo htmlspecialchars($palabra); ?></strong></p>
    <a href="index.php">🔁 Jugar de nuevo</a>
</body>

</html>