<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 19-03-2016
 * Time: 20:06
 */

include_once('csrfFilter.php');

include_once('appModels/appModel.php');
include_once('appControllers/appController.php');
include_once('appViews/appView.php');

$db = new appModel();
$controller = new appController($db);
$view = new appView($db, $token);

$action = '';

if (isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    $controller->insertContact($_POST['nameField'], $_POST['emailField']);
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
}

echo $view->output($action);