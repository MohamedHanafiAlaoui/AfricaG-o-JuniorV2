<?php
require('Continent.php');

if (isset($_GET['id'])) {
    $continentId = $_GET['id'];

    $continentObj = new Continent();

    $continentObj->deletecontinent($continentId);

    header('Location: user.php');
    exit;
} else {
    header('Location: user.php');
    exit;
}
?>
