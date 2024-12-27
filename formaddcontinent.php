<?php
session_start();

include('add_continent.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $nombre_pays = $_POST['nombre_pays'];
    $image = $_POST['continent_image']; 

    $continent = new Continent();
    if ($continent->addContinent($name, $nombre_pays, $image)) {
        // echo "Continent added successfully!";
    } else {
        echo "Error adding continent!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Continent</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-10 p-6 max-w-lg bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-semibold text-center text-gray-700 mb-6">Add a New Continent</h1>
        <form action="formaddcontinent.php" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-medium mb-2">Continent Name:</label>
                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="nombre_pays" class="block text-gray-600 font-medium mb-2">Number of Countries:</label>
                <input type="number" id="nombre_pays" name="nombre_pays" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <!-- Text Input for Image URL -->
            <div class="mb-4">
                <label for="continent_image" class="block text-gray-600 font-medium mb-2">Continent Image URL:</label>
                <input type="text" id="continent_image" name="continent_image" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter the image URL" required>
            </div>
            
            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600 transition duration-300">Add Continent</button>
        </form>
    </div>
</body>
</html>
