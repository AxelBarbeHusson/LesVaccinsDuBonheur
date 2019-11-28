<?php
include('./pdo.php');

if (!empty($_SESSION['login']['role']=== 'Admin')){
if ($_GET['id'] && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM t_users WHERE Id_Users = $id";
    $query = $pdo ->prepare($sql);
    //$query -> bindValue(':id',$id,PDO::PARAM_INT);
    $query -> execute();

    echo "Vous avez bien supprimé votre utilsateurs";
    //header("Location: manageUsers.inc.php");
}
}else{
    echo "Erreur 403, vous n'avez pas accès a cette fonctionnalité";
}