<?php

if (isset($_SESSION) == false) {
    session_start();
}

require_once("./controllers/UsuarioController.php");

$controller = new UsuarioController();

$action = "";
if ( isset( $_GET["action"] )) {
    $action = $_GET["action"];
}

if (isset($_SESSION["usuario_id"]) || $action=="login") {
    switch ($action) {
        case "logout":
            $controller->logout();
        case "login":
            if ( isset( $_POST["email"] ) && isset( $_POST["senha"] )) {
                $controller->login($_POST);
            }
            break;
        default:
            header("Location: ./home.php");
            break;
    }
} else {
    header("Location: ./login.php");
    exit;
}