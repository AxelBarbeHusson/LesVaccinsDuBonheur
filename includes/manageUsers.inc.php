<?php


$title = 'show users';
if (!empty($_SESSION['login']['role']=== 'Admin')){

    $sql = "SELECT * FROM t_users
        WHERE 1";


    $query = $pdo->prepare($sql);
    $query->execute();
    $users = $query->fetchAll();

debug($users); ?>

<h1>Show users</h1>
<?php foreach ($users as $user) {
    echo '<div class="user">';
    echo '- ' . $user->USENOM . ' ' . $user->USEPRENOM. '';
//debug($users);

    echo '<br><a href=#><span>Edit</span></a>';
    echo '<br><a href="index.php?page=backDeleteUser?id=' . $user->Id_Users . '"><span>Delete</span></a>';

    echo '</div>';
}

}else{
    echo "Erreur 403, vous n'avez pas accès a cette fonctionnalité";
}
?>
