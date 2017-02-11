<?php
/**
 * Created by PhpStorm.
 * User: William Montesdeoca
 * Date: 2/10/2017
 * Time: 10:58 PM
 */
session_start();
if (session_destroy()) {
    header("Location: login.php");
}
?>