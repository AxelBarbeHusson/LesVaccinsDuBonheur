<h1 id="nav">Etat Vaccins</h1>
<?php
if (!empty($_SESSION)){
    debug($_SESSION);
    $id = $_SESSION['login']['id'];
    $sql = "SELECT USENOM, nom
        FROM users_vaccins
        JOIN t_users ON t_users.Id_Users = users_vaccins.Id_Users
        JOIN vaccins ON vaccins.id = users_vaccins.id
        WHERE t_users.Id_Users = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    $userVaccins = $query->fetchAll();
    //debug($userVaccins);
    echo '<div class = vaccinsUsers>';
    echo 'Vos vaccins :';
    foreach($userVaccins as $userVaccin) {
        echo $userVaccin->nom;


    }
    echo '</div>';
}else{
    $sql = "SELECT * FROM vaccins
            WHERE 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    $vaccins = $query->fetchAll();
 foreach ($vaccins as $vaccin) {
            echo '<div class="vaccins">';
            echo '- ' . $vaccin->nom . ' crée le : ' . $vaccin->created_at . '. Premier rappel dans (' . $vaccin->rappel1 .') jours & second dans (' . $vaccin->rappel2 . ') jours.';
            //echo $vaccin;
            echo '</div>';
    }
}