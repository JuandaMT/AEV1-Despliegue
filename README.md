# 🕹️ Juego del Ahorcado (PHP)

Este es un sencillo juego del **Ahorcado** desarrollado en **PHP**.  
El objetivo es adivinar la palabra secreta antes de que se terminen las vidas disponibles.

---

## 🚀 Cómo jugar

1. Abre el proyecto en tu servidor local (por ejemplo, usando XAMPP, MAMP o Laragon).
2. Asegúrate de tener activo el módulo **PHP**.
3. Coloca todos los archivos del juego (por ejemplo `index.php`, `ganado.php`, `perdido.php`) en la carpeta del servidor, por ejemplo:
4. En tu navegador, entra a: http://localhost/ahorcado/index.php
5. Aparecerá una palabra oculta representada con signos de interrogación `?`.
6. Introduce una letra y pulsa **Adivinar**.
7. Cada acierto mostrará las letras correctas en su posición.
8. Cada fallo restará una vida.
9. Si adivinas todas las letras, ganarás 🎉 y serás redirigido a la página de victoria (`ganado.php`).
10. Si pierdes todas tus vidas, se mostrará la página de derrota (`perdido.php`).

---

## ⚙️ Archivos principales

| Archivo | Descripción |
|----------|--------------|
| `index.php` | Contiene la lógica principal del juego y la interfaz para introducir letras. |
| `ganado.php` | Muestra el mensaje de victoria y un botón para jugar de nuevo. |
| `perdido.php` | Muestra el mensaje de derrota y un botón para volver a empezar. |

---

## 🧱 Requisitos

- PHP 7.4 o superior  
- Servidor web local (Apache recomendado)

---

## 👩‍💻 Autor

Desarrollado por **Juan David Mayorga**  
Proyecto educativo de práctica en PHP.

---

## 📜 Licencia

Este proyecto es de uso libre para fines educativos.
