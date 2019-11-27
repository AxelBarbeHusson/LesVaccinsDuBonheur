<?php
include('../includes/pdo.php');
include('../functions/clean.php');
include('../functions/debug.php');

$title = 'show users';

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
        echo '<p>';
            //echo '<a href="updateCity.php?id=' . $city['ID'] . '"> Edit</a>';
            echo '</p>';
        echo '</div>';
    }?>
