<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 19-03-2016
 * Time: 21:14
 */

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['token'])) {
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
} else {
    $token = $_SESSION['token'];
}