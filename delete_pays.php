<?php
require('pays.php');

if (isset($_GET['id'])) {
    $continentId = $_GET['id'];

    $continentObj = new pays();

    $continentObj->deletepays($continentId);

    header('Location: userpays.php');
    exit;
} else {
    header('Location: userpays.php');
    exit;
}
?>
