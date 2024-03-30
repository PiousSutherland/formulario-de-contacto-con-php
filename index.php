<!DOCTYPE html>
<html>
<body>

<h2>Formulario de Contacto</h2>

<form method="post" action="index.php">
 <label for="fname">Nombre</label><br>
 <input type="text" id="fname" name="fname" required><br>
 <label for="email">Correo electrónico</label><br>
 <input type="email" id="email" name="email" required><br>
 <label for="message">Mensaje</label><br>
 <textarea id="message" name="message" required></textarea><br>
 <input type="submit" value="Enviar">
</form> 

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize
    $name = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($name) || empty($email) || empty($message))
        echo("<script>alert('Por favor rellena todos los campos')</script>");
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
        echo "<script>alert('Por favor introduce un correo electrónico válido')</script>";
    else{
        $to = "your-email@example.com";
        $subject = "Nuevo mensaje de contacto";
        $body = "Nombre: $name\nCorreo electrónico: $email\nMensaje: $message";
        $headers = "From: $email";

        if(mail($to, $subject, $body, $headers)){
            echo "Mensaje enviado exitosamente";
        } else{
            echo "Error al enviar el mensaje";
        }
    }
}
?>

</body>
</html>
