<?php


function ifLogged()
{
    if (!empty ($_SESSION['login'])) {
        if (!empty($_SESSION['login']['id']) && filter_var($_SESSION['login']['id'], FILTER_VALIDATE_INT)) {
            if (!empty($_SESSION['login']['email']) && filter_var($_SESSION['login']['email'], FILTER_VALIDATE_EMAIL)) {
                if (!empty($_SESSION['login']['role']) && filter_var($_SESSION['login']['role'], FILTER_VALIDATE_INT)) {
                    if (!empty($_SESSION['login']['ip']) && $_SERVER['REMOTE_ADDR'] == $_SESSION['login']['ip']) {
                        return true;
                    }
                }
            }
        }
    }
    return false;
}