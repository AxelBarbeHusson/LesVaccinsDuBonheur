<h1 id="gens">Etat Vaccins</h1>
<?php
if (!empty($_SESSION)){
    //debug($_SESSION);
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
    echo '<br>';
    echo '<br>';
    foreach($userVaccins as $userVaccin) {
        echo '<p class="nomVaccin">- ' . $userVaccin->nom . '</p>';
        echo '<br>';
        echo '<br>';
    }

    $sql = "SELECT * FROM vaccins
            WHERE 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    $vaccins = $query->fetchAll();
    //debug($vaccins);
    if(!empty($_POST['submitted'])) {

        $idvaccin = trim(strip_tags($_POST['vacccinnns']));

        $sql = "INSERT INTO users_vaccins (Id_Users, id) 
        VALUES (:iduser, :id)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':iduser', $id, PDO::PARAM_INT);
        $query->bindValue(':id', $idvaccin, PDO::PARAM_INT);
        $query->execute();
    }
    ?>
    <form action="" method="post" novalidate class="form-wrap">
        <label id="labell">Ajouter un vaccin à votre carnet :</label>
        <select name="vacccinnns">
            <?php foreach($vaccins as $vaccin) { ?>
                <option value="<?php echo $vaccin->id; ?>"><?php echo $vaccin->nom;?></option>
            <?php } ?>
        </select>
        <input id="putput" type="submit" name="submitted" value="Envoyer">
    </form>

    <?='</div>'; ?>
<?php
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