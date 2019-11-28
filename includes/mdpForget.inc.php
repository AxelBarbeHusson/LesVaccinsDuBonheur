<h1>MDP oublié</h1>
<?php
if (isset($_POST['maurice'])) {
    die('TEST 1');
    $mail = isset($_POST['mail']) ? clean($_POST['mail']) : "";
    $date = isset($_POST['date']) ? clean($_POST['date']) : "";

    $mdp = isset($_POST['mdp']) ? clean($_POST['mdp']) : "";


    $erreurs = array();

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        array_push($erreurs, "Veuillez saisir une adresse mail valide.");
    if (mb_strlen($mdp) < 6)
        array_push($erreurs, "Votre mot de passe doit comporter 6 caractères minimum");
    if (count($erreurs) > 0) {
        $message = "<ul>";
        $i = 0;
        while ($i < count($erreurs)) {
            $message .= "<li>" . $erreurs[$i] . "</li>";
            $i++;
        }


        if (!isset($date)) $date = "";

        if (!isset($mail)) $mail = "";
    } else {
        die('TEST');
        $sql = "SELECT * FROM t_users WHERE 1";

        $query = $pdo->prepare($sql);
        $query->execute();
        $users = $query->fetchAll();
        if ($_POST['mail'] == $users['USEMAIL'] && $_POST['date'] == $users['birthdate']) {
            $mdp = password_hash($mdp, PASSWORD_DEFAULT);
            $sql = "UPDATE t_users
               SET USEPASSWORD = :password, modifAt = NOW()
               WHERE USEMAIL = $mail";
            $query = $pdo->prepare($sql);
            $query->bindValue(':password', $mdp, PDO::PARAM_STR);

            $query->execute();
        }
    }

}
?>
<form method="post" class="form-wrap" action="./index.php?page=acceuil">


    <div>
        <label for="date">Date :</label>
        <input type="date" id="date" name="date" value="<?= $date ?>"/>
    </div>
    <div>
        <label for="mail">Mail&nbsp;: </label>
        <input type="text" id="mail" name="mail" value=""/>
    </div>
    <div>
        <label for="mdp">Mot de passe&nbsp;: </label>
        <input type="password" id="mdp" name="mdp"/>
    </div>

    <div>
        <input type="reset" value="Effacer"/>
        <input type="submit" value="Envoyer"/>
    </div>
    <input type="hidden" name="maurice"/>
</form>