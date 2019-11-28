<?php

if ($_GET['login']['Id_Users'] && is_numeric($_GET['Id_Users'])){
    $sql='SELECT * FROM t_users';
    $query = $pdo ->prepare($sql);
    //$query -> bindValue(':id',$id,PDO::PARAM_INT);
    $query -> execute();
    ldap_delete(localhost/carnex,$sql);
    echo "Vous avez bien supprimé votre utilsateurs";
    //header("Location: manageUsers.inc.php");
}
