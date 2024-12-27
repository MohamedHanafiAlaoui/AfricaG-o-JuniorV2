<?php
session_start();

include('Continent.php');
$continentObj = new Continent();
$continents = $continentObj->getAllContinents();

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
        <h1 class="text-2xl font-semibold text-center text-gray-700 mb-6">Add a New pays</h1>
        <form action="add_pays.php" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-medium mb-2">pays Name:</label>
                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
            <select name="continent" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php 
                    foreach($continents as $continent) :?>
                        <option value="<?= ($continent['id_continent']); ?>"><?= htmlspecialchars($continent['name']);?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="mb-4">
                <label for="population" class="block text-gray-600 font-medium mb-2">population:</label>
                <input type="number" id="population" name="population" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-600 font-medium mb-2">description:</label>
                <input type="text" id="description" name="description" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="langues" class="block text-gray-600 font-medium mb-2">langues:</label>
                <input type="text" id="langues" name="langues" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <!-- Text Input for Image URL -->
            <div class="mb-4">
                <label for="Image" class="block text-gray-600 font-medium mb-2">pays Image URL:</label>
                <input type="text" id="Image" name="Image" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter the image URL" required>
            </div>
            
            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600 transition duration-300">Add Continent</button>
        </form>
    </div>
</body>
</html>
