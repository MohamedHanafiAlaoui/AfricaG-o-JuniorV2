<?php
require('Continent.php');

if (isset($_GET['id'])) {
    $continentId = $_GET['id'];

    $continentObj = new Continent();

    $continentObj->deletecontinent($continentId);

    header('Location: userpays.php');
    exit;
} else {
    header('Location: userpays.php');
    exit;
}
?>
