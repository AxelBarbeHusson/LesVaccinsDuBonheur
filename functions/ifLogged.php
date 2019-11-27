<?php
function ifLogged(){
    if(!empty($_SESSION['login']['Id_Users'])){
        if (!empty($_SESSION['login']['USEMAIL'])){
            if (!empty($_SESSION['login']['role'])){
                if (!empty($_SESSION['login']['ip']) == $_SERVER['REMOTE_ADDR']) {
                    return true;
                }
            }
        }
    }
    return false;
}