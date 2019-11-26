<?php
$errors = array();
$success = false;
if (!empty ($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

//Select=colonne; FROM= table; WHERE -> col1 = valeur; AND col2 = valeur2; ORDER BY = col ASC/DESC ; LIMIT = combien;
    $sql = "SELECT * FROM t_users 
            WHERE ID = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    $users = $query->fetch();
    //debug($citys);
    if (!empty($users)) {
        if (!empty($_POST['submitted'])) {
            //debug($_POST);
            $nom = isset($_POST['nom']) ? clean($_POST['nom']) : "";
            $prenom = isset($_POST['prenom']) ? clean($_POST['prenom']) : "";
            $mail = isset($_POST['mail']) ? clean($_POST['mail']) : "";
            $mdp = isset($_POST['mdp']) ? clean($_POST['mdp']) : "";
            $errors = textWalid($errors, $nom, 'nom', 2, 200);
            $errors = textWalid($errors, $prenom, 'prenom', 2, 200);


            // no error
            if (count($errors) == 0) {
                // insert into
                $success = true;

                $sql = "UPDATE t_users
               SET USENOM = :nom, USEPRENOM = :prenom, USEMAIL = :mail, USEPASSWORD = :password
               WHERE ID = $id";
                $query = $pdo->prepare($sql);
                $query->bindValue(':nom', $nom, PDO::PARAM_STR);
                $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                $query->bindValue(':mail', $mail, PDO::PARAM_INT);
                $query->bindValue(':password', $mdp, PDO::PARAM_INT);

                $query->execute();


            }
        }
    } else {
        //die('404');
    }

} else {
   // die('404');
}
//debug($citys);

?>
<?php if ($success) { ?>
    <p class="success">Vous avez bien modifier vos information</p>
<?php } else { ?>
    <form method="post" action="">
        <fieldset>
            <div>
                <label for="nom">Votre nom :</label>
                <input type="text" id="nom" name="nom" value="<?php if (!empty($_POST['nom'])) {
                    echo $_POST['nom'];
                } else {
                    echo $users['USENOM'];
                } ?>">
                <span class="error"><?php if (!empty($errors['nom'])) {
                        echo $errors['nom'];
                    }
                    ?></span>
            </div>
            <div>
                <label for="prenom">Votre prenom :</label>
                <input type="text" id="prenom" name="prenom" value="<?php if (!empty($_GET['prenom'])) {
                    echo $_GET['prenom'];
                } else {
                    echo $users['USEPRENOM'];
                } ?>">
                <span class="error"><?php if (!empty($errors['code'])) {
                        echo $errors['prenom'];
                    } ?></span>
            </div>
            <div>
                <label for="mail">Votre mail :</label>
                <input type="email" id="mail" name="mail" value="<?php if (!empty($_GET['mail'])) {
                    echo $_GET['mail'];
                } else {
                    echo $users['USEMAIL'];
                } ?>">
                <span class="error"><?php if (!empty($errors['mail'])) {
                        echo $errors['mail'];
                    } ?></span>
            </div>
            <div>
                <label for="mdp">Votre mot de passe :</label>
                <input type="password" id="population" name="population" value="<?php if (!empty($_GET['mdp'])) {
                    echo $_GET['mdp'];
                } else {
                    echo $citys['USEPASSWORD'];
                } ?>">
                <span class="error"><?php if (!empty($errors['mdp'])) {
                        echo $errors['mdp'];
                    } ?></span>
            </div>

            <div>
                <input class="blue_button" name="submitted" type="submit" value="Envoyer"/>
                <input class="blue_button" type="reset" value="Effacer"/>
            </div>
        </fieldset>
        <input type="hidden" name="test"/>
    </form>
<?php } ?>

