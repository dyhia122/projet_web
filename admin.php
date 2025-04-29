<?php
require_once "class/Autoloader.php";
Autoloader::register();

// Inclure le header
require_once "pages/header.php";

use admin\AdmineLogger;

$logger = new AdmineLogger();

// Traitement du formulaire
if (isset($_POST['username']) && isset($_POST['password'])) {
    $response = $logger->log(trim($_POST['username']), trim($_POST['password']));

    if ($response['granted']) {
        echo "<p style='color:green; font-size:1.2em;'>".$response['msg']."</p>";
        // TODO : rediriger vers un espace admin après connexion
    } else {
        echo "<p style='color:red; font-size:1.2em;'>".$response['error']."</p>";
    }
}

// Afficher le formulaire
$logger->generateLoginForm($_SERVER['PHP_SELF']);

// Inclure le footer
require_once "pages/footer.php";
?>
