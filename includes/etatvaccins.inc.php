<h1 id="nav">Etat Vaccins</h1>
<?php
if (!empty($_SESSION)){

}else{

        $sql = "SELECT * FROM vaccins
        WHERE 1";


        $query = $pdo->prepare($sql);
        $query->execute();
        $users = $query->fetchAll();

 foreach ($users as $user) {
            echo '<div class="user">';
            echo '- ' . $user->nom . ' crée le : ' . $user->created_at . '. Premier rappel dans (' . $user->rappel1 .') jours & second dans (' . $user->rappel2 . ') jours.';
            echo '</div>';
    }
}