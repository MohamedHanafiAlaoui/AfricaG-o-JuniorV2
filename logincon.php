<?php
include('conect_db.php');  
include('login.php');      

if (isset($_POST['submit'])) {

    $db = new Controller(); 
    $user = new User($db);   
    $user->setEmail($_POST['email']);        
    $user->setPassword($_POST['password']);
    $user->setFirstName($_POST['first-name']); 
    $user->setLastName($_POST['Last-name']);
    $user->setRoleId(2);

    $response = $user->register();  

    
    header("Location:/front_and/user.php");
    exit;  

    echo "<div class='text-center mt-4'>" . $response . "</div>";

    $db->close(); 
}
?>
