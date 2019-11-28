<?php
debug($_POST);
if ($_GET['login']['id'] /*&& is_numeric($_GET['Id_Users'])*/){
    $sql='DELETE FROM t_users WHERE Id_Users';
    $query = $pdo ->prepare($sql);
    //$query -> bindValue(':id',$id,PDO::PARAM_INT);
    $query -> execute();
    debug($query);
    echo "Vous avez bien supprimé votre utilsateurs";
    //header("Location: manageUsers.inc.php");
}
