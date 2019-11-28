<?php

$errors = array();
$success = false;
if (!empty($_SESSION['login']['role']=== 'Admin')){
    if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        // request
        $sql = "SELECT * FROM t_users
          WHERE id = $id";
        $query = $pdo->prepare($sql);
        $query->execute();
        $editUsers = $query->fetch();
        //debug($editUsers);
        if (!empty($editUsers)) {

            if (!empty($_POST['submitted'])) {
                // Faille XSS
                //debug($_POST);
                $nom = clean($_POST['nom']);
                $prenom = clean($_POST['prenom']);
                $mail = clean($_POST['mail']);

                // no error
                if (count($errors) == 0) {
                    // insert into
                    $success = true;
                    // UPDATE SQL
                    $sql = "UPDATE t_users
          SET USENOM = :nom, USEPRENOM = :prenom, USEMAIL = :mail,
          WHERE ID = $id";
                    $query = $pdo->prepare($sql);
                    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
                    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                    $query->bindValue(':mail', $mail, PDO::PARAM_STR);
                    $query->execute();

                }
            }

        } else {
            die('404');
        }
    }

    ?>

    <?php if ($success) { ?>
        <p>Bravo ma biche</p>
    <?php } else { ?>
        <form action="" method="post">
            <label for="nom">Nom à modifier*</label>
            <input type="text" id="nom" name="nom" value="<?php if (!empty($_POST['nom'])) {
                echo $_POST['nom'];
            } else {
                echo $editUsers['nom'];
            } ?>">
            <span class="error"><?php if (!empty($errors['nom'])) {
                    echo $errors['nom'];
                } ?></span>

            <label for="prenom">Prenom à modifier*</label>
            <input type="text" id="prenom" name="prenom" value="<?php if (!empty($_GET['prenom'])) {
                echo $_GET['prenom'];
            } else {
                echo $editUsers['prenom'];
            } ?>">
            <span class="error"><?php if (!empty($errors['prenom'])) {
                    echo $errors['prenom'];
                } ?></span>

            <label for="mail">Mail à modifier*</label>
            <input type="text" id="mail" name="mail" value="<?php if (!empty($_GET['mail'])) {
                echo $_GET['mail'];
            } else {
                echo $editUsers['mail'];
            } ?>">
            <span class="error"><?php if (!empty($errors['mail'])) {
                    echo $errors['mail'];
                } ?></span>


            <input type="submit" name="submitted" value="Envoyer">

        </form>
    <?php } }else{
    echo "Erreur 403, vous n'avez pas accès a cette fonctionnalité";
}?>