<?php
include '../functions/error.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require_once("./connection.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM usuario WHERE us_email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && (password_verify($password, $user['us_password']) || $user['us_password'] == "hashedpassword")) {
        if ($user['us_status']) {
            $_SESSION['usuario'] = $user;
            if ($user['us_password'] == "hashedpassword") {
                $_SESSION['error_message'] = "Debe cambiar su contraseña.";
                header("Location: ../view/profile.php");
            } else {
                header("Location: ../view/dashboard.php");
               
            }
            exit;
        } else {
            $_SESSION['login_email'] = $email;
            $_SESSION['error_message'] = "Usuario Inactivo";
        }
    } else {
        $_SESSION['login_email'] = $email;
        $_SESSION['error_message'] = "Usuario o contraseña incorrecta";
    }

    header("Location: ../index.php");
    exit;
}
?>
