<?php
include('../includes/pdo.php');
include('../functions/clean.php');
include('../functions/debug.php');

if (!empty($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    deleteUser($id);
    header("Location: manageUsers.php");
}
