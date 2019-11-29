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

    $sql = "SELECT * FROM vaccins
            WHERE 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    $vaccins = $query->fetchAll();
    //debug($vaccins);
    $idvaccin = 0;
    if(!empty($_POST['submitted'])) {
        $sql = "INSERT INTO users_vaccins (Id_Users, id) 
        VALUES ($id, $idvaccin)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':Id_Users', $id, PDO::PARAM_INT);
        $query->bindValue(':Id_Users', $id, PDO::PARAM_INT);
        $query->execute();
        die('insert done');
    }
    ?>
    <section>
        <img id="imagemedo" src="assets/img/medimg.jpg" alt="">

    </section>
    <form class="form-wrap">
        <label>Ajouter un vaccin à votre carnet :</label>
        <select>
            <?php foreach($vaccins as $vaccin) { ?>
                <option><?php $idvaccin=$vaccin->id; echo $vaccin->nom;?></option>
            <?php } ?>
        </select>
        <input type="submit" name="" value="Envoyer <?php if(isset($_POST['submitted'])) { die('ok'); } ?>">
    </form>
    <input type="hidden" name="submitted">

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