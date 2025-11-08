<?php
session_start();

// Lista de palabras para el juego
$palabras = ['elefante', 'jirafa', 'hipopotamo', 'rinoceronte', 'cocodrilo', 'camello', 'chimpance', 'jaguar', 'leon', 'tigre', 'picozapato'];

// Inicializar el juego
if (!isset($_SESSION['palabra'])) {
    $_SESSION['palabra'] = $palabras[array_rand($palabras)];
    $_SESSION['vidas'] = 6; // Número máximo de vidas
    $_SESSION['letras_acertadas'] = str_repeat('?', strlen($_SESSION['palabra']));
    $_SESSION['letras_usadas'] = [];
}

// Procesar la letra enviada
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['letra'])) {
    $letra = strtolower($_POST['letra']);

    // Verificar si la letra ya se ha usado
    if (in_array($letra, $_SESSION['letras_usadas'])) {
        echo "Ya has usado la letra '$letra'. Intenta con otra.<br>";
    } else {
        // Añadir la letra a las usadas
        $_SESSION['letras_usadas'][] = $letra;

        // Verificar si la letra está en la palabra secreta
        if (strpos($_SESSION['palabra'], $letra) !== false) {
            for ($i = 0; $i < strlen($_SESSION['palabra']); $i++) {
                if ($_SESSION['palabra'][$i] == $letra) {
                    $_SESSION['letras_acertadas'][$i] = $letra;
                }
            }
        } else {
            $_SESSION['vidas']--;
        }
    }
}

// Comprobar si se ha ganado o perdido
if ($_SESSION['letras_acertadas'] == $_SESSION['palabra']) {
    header('Location: success.php');
    exit();
} elseif ($_SESSION['vidas'] <= 0) {
    header('Location: fail.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ahorcado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f3f6fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #1a73e8;
            font-size: 2rem;
            margin-top: 2rem;
        }

        form {
            margin: 2rem auto;
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: fit-content;
        }

        input[type="text"] {
            width: 25px;
            height: 25px;
            font-size: 1.2rem;
            text-align: center;
            margin-right: 0.5rem;
            border: 1px solid #aaa;
            border-radius: 4px;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 4px #1a73e8;
        }

        button {
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 0.4rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #155bb5;
        }

        p {
            margin: 0.5rem 0;
        }

        a {
            display: inline-block;
            margin-top: 1rem;
            color: #1a73e8;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Juego del Ahorcado</h1>
    <p>Palabra secreta: <?php echo $_SESSION['letras_acertadas']; ?></p>
    <p>Vidas restantes: <?php echo $_SESSION['vidas']; ?></p>
    <form method="post">
        <label for="letra">Introduce una letra:</label>
        <input type="text" name="letra" id="letra" maxlength="1" required>
        <button type="submit">Adivinar</button>
    </form>
    <p>Letras usadas: <?php echo implode(', ', $_SESSION['letras_usadas']); ?></p>
</body>

</html>