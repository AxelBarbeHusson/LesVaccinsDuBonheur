<?php


$title = 'show users';

if (isset($_POST['t_users'])){

    $sql = "SELECT * FROM t_users
        WHERE 1";


    $query = $pdo->prepare($sql);
    $query->execute();
    $users = $query->fetchAll();

//debug($users); ?>

<h1>Show users</h1>
<?php foreach ($users as $user) {
    echo '<div class="user">';
    echo '- ' . $user->USENOM . ' ' . $user->USEPRENOM. '';
debug($_POST);

    echo '<br><a href=#><span>Edit</span></a>';
    echo '<br><a href="index.php?page=backDeleteUser"><span>Delete</span></a>';

    echo '</div>';
}

}

?>
<a href="index.php?page=addVaccins">Ajouter un nouveau vaccin</a>