
if($_POST && isset($_POST["reset_password"])) {
    $email = $_POST["email"];

    // Buscar al usuario por correo electrónico
    $user = $database->select("tb_users", "*", ["email" => $email]);

    if(count($user) > 0) {
        // Generar y almacenar un token único en la base de datos
        $token = bin2hex(random_bytes(32));
        $database->insert("password_reset", [
            "user_id" => $user[0]["id"],
            "token" => $token,
            "timestamp" => time()
        ]);

        // Enviar un correo electrónico con el enlace de restablecimiento de contraseña
        $reset_link = "http://tu-sitio.com/reset_password_confirm.php?token=$token";
        // Aquí debes agregar tu código para enviar un correo electrónico
        // con el enlace de restablecimiento ($reset_link)
    }

    // Mostrar un mensaje al usuario indicando que se ha enviado un correo electrónico
    echo "Se ha enviado un enlace de restablecimiento de contraseña a tu correo electrónico.";
}
