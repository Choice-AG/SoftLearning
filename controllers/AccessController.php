<?php

include_once '../model/checks/Checker.php';
include_once '../persistence/MysqlUserAdapter.php';

$persistence = new MysqlUserAdapter();
$datauser = [];
$ok = false;

if (($user = filter_input(INPUT_POST, 'user')) != null and
        ($passwd = filter_input(INPUT_POST, 'passwd')) != null) {
    try {
        $user = $persistence->authentication($user, $passwd);
        setcookie('userid', $user->getId(), 0, '/', 'localhost');
        setcookie('username', $user->getName(), 0, '/', 'localhost');
        setcookie('userlevel', $user->getLevel(), 0, '/', 'localhost');
        setcookie('userpoints', $user->getPoints(), 0, '/', 'localhost');
        header('location: ../views/MainView.php');
    } catch (ServiceException $ex) {
        header('location: ../views/BadLogin.php');
    }
}
