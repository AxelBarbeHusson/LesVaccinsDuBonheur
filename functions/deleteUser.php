<?php
include ('../index.php');
include('../includes/pdo.php');

function deleteUser($id){
$sql="DELETE FROM t_users WHERE Id_Users=:id";
$query = $pdo ->prepare($sql);
$query -> bindValue(':id',$id,PDO::PARAM_INT);
$query -> execute();
}