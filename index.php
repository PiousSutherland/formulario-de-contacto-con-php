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
   $name = $_POST['fname'];
   $email = $_POST['email'];
   $message = $_POST['message'];

    if(isset($name) && isset($email) && isset($message))
    {
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
    else
        echo("<script>alert('Por favor rellena todos los campos')</script>");
}
?>

</body>
</html>
