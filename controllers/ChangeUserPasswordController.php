<?php

declare(strict_types=1);

include_once '../model/checks/Checker.php';
include_once '../persistence/MysqlUserAdapter.php';

$persistence = new MysqlUserAdapter();
$message = "Unsucessfully Request: ";
$usuari = filter_input(INPUT_COOKIE, 'username');
$currentpsswd = filter_input(INPUT_POST, 'currentpswd');
$newpswd = filter_input(INPUT_POST, 'newpswd');
$confirmpswd = filter_input(INPUT_POST, 'retrypswd');

if ($newpswd) {
    if ($newpswd === $confirmpswd) {
        try {
            $u = $persistence->authentication($usuari, $currentpsswd);
            if ($u->setPassword($newpswd) == 0) {
                $persistence->updateUser($u);
                $message = "Changes done";
            }else{
                $message .= "Not valid password";
            }            
        } catch (ServiceException $ex) {
            $message .= $ex->getMessage();
        }
    } else {
        $message .= "Wrong password confirmation";
    }
} else {
    $message .= "No data found";
}

setcookie('response', $message, 0, '/', 'localhost');
header('location: ../views/UserActionResponse.php');
