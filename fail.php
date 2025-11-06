<?php
session_start();
$palabra = $_SESSION['palabra'] ?? 'desconocida';
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Has perdido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #ffebee;
            color: #c62828;
        }

        h1 {
            margin-top: 2rem;
        }

        a {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.6rem 1rem;
            background-color: #c62828;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #9b1f1f;
        }
    </style>
</head>

<body>
    <h1>💀 Lo siento, has perdido</h1>
    <p>La palabra era: <strong><?php echo htmlspecialchars($palabra); ?></strong></p>
    <a href="index.php">🔁 Jugar de nuevo</a>
</body>

</html>