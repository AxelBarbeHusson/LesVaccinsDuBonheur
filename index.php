<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == 1 ) {
    if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {
        $bonjour = $_SESSION['prenom'] . " " . $_SESSION['nom'];
    }
} else {
    unset($bonjour);
}
//echo_session_id();
date_default_timezone_set('Europe/Paris');
include_once "functions/debug.php";
include_once "functions/clean.php";
include_once "functions/verifyMail.php";
include_once "functions/textWalid.php";
include_once "functions/ifLogged.php";
include_once "functions/idAdmin.php";
include_once "includes/pdo.php";
include_once "functions/displayTitle.php";
include_once "includes/html.php";
include_once "includes/header.php";
//require_once './functions/htmltopdf.php';
//require_once dirname(FILE).'/../vendor/autoload.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "accueil";
}
$path = "includes/";
$contenu = glob($path . "*.inc.php");
$page = $path . $page . ".inc.php";
if (in_array($page, $contenu)) {
    include_once $page;
} else {
    include_once "includes/accueil.inc.php";
}
include_once "includes/footer.inc.php";
