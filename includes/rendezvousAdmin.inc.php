<?php

$title = 'Les rendez-vous';
if (!empty($_SESSION['login']['role']=== 'Admin')){
    $sql = "SELECT * FROM t_test
        WHERE 1";


    $query = $pdo->prepare($sql);
    $query->execute();
    $users = $query->fetchAll();

//debug($users); ?>

    <h1>Rendez-Vous</h1>
    <?php foreach ($users as $user) {
        echo '<div class="user">';
        echo '- ' . $user->USENOM . ' ' . $user->USEPRENOM. '';
//debug($users);

        echo '<br><p>'. $user->USEMAIL .'</p>';
        echo '<br><p>'. $user->USEPHONE .'</p>';
        echo '<br><p>'. $user->USEAPOSTAL .'</p>';
        echo '<br><p>'. $user->USECPOSTAL .'</p>';
        echo '<br><p>'. $user->USEVILLE .'</p>';
        echo '<br><p>'. $user->USESUJET .'</p>';
        echo '<br><p>'. $user->USEMESSAGE .'</p>';
        echo '<br><p>'. $user->USEDATE .'</p>';
        echo '<br><a href="./includes/backDeleteUser.inc.php?id=' . $user->ID_USER . '"><span>Delete User</span></a>';
        echo '</div>';
    }

}else{
    echo "Erreur 403, vous n'avez pas accès a cette fonctionnalité";
}
