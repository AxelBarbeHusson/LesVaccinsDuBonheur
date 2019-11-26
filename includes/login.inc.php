
<?php
if (isset($_POST['barnabe'])) {
    $mail = isset($_POST['mail']) ? clean($_POST['mail']) : "";
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
        $message .= "</ul>";
        echo $message;
        //include "frmLogin.php";
    } else {
        echo "Test matching login/password";
        $getDatas = "SELECT * FROM t_users WHERE USEMAIL='" . $mail . "'";
        $result = $pdo->query($getDatas)->fetch(PDO::FETCH_ASSOC);
        $_SESSION['nom'] = $result['USENOM'];
        $_SESSION['prenom'] = $result['USEPRENOM'];
        $hash = $result['USEPASSWORD'];
        if (password_verify($mdp, $hash)) {
            $_SESSION['login'] == 1;
            $redirection = "<script>document.location.href='http://localhost/carnex'</script>";
            echo "Vous êtes maintenant connecté";
        } else {
            echo "L'adresse et le mot de passe ne correspondent pas !";
        }
        /*$mdp = password_verify($mdp, $hash);
        $sql = "SELECT COUNT(*) FROM t_users WHERE USEMAIL='". $mail . "' AND USEPASSWORD ='" . $mdp . "''";
        $nombreOccurences = $pdo->query($sql)->fetchColumn();*/
    }
}else {
    require_once "frmLogin.php";}