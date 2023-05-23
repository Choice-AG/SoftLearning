<?php

declare(strict_types=1);

include_once '../model/checks/Checker.php';
include '../exceptions/BuildException.php';
include_once '../persistence/MysqlUserAdapter.php';

$persistence = new MysqlUserAdapter();
$message = "Unsucessfully Request: ";
$usuari = filter_input(INPUT_POST, 'name');
$pswd = filter_input(INPUT_POST, 'pswd');
$level = (int) filter_input(INPUT_COOKIE, 'userlevel');

if ($usuari and $pswd) {
    if ($level >= 3) {
        try {
            if ($persistence->exists($usuari) === false) {
                $id = $persistence->maxUserid() + 1;
                $user = new User($id, $usuari, $pswd);
                $persistence->addUser($user);
                $message = "Changes done";
            } else {
                $message .= "User Exists";
            }
        } catch (ServiceException $ex) {
            $message .= $ex->getMessage();
        } catch (BuildException $ex) {
            $message .= $ex->getMessage();
        }
    } else {
        $message .= "Level 3 o higher required";
    }
} else {
    $message .= "Few fields data found";
}

setcookie('response', $message, 0, '/', 'localhost');
header('location: ../views/UserActionResponse.php');