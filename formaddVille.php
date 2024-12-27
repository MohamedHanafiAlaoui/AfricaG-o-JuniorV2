<?php
// include('conect_db.php');
require('pays.php');
$continentObj = new pays();
$continents = $continentObj->getAllContinents();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Continent or City</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-10 p-6 max-w-lg bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-semibold text-center text-gray-700 mb-6">Add a New Entity</h1>
        <form action="./add_Ville.php" method="POST">
            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-medium mb-2">Name:</label>
                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <!-- Description Input -->
            <div class="mb-4">
                <label for="description" class="block text-gray-600 font-medium mb-2">Description:</label>
                <textarea id="description" name="description" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            

            <div class="mb-4">
                <label for="id_pays" class="block text-gray-600 font-medium mb-2">pays:</label>
                <select id="id_pays" name="id_pays" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php 
                    foreach($continents as $continent) :
                    ?>
                        <option value="<?= ($continent['id_pays']); ?>">

                        <?= htmlspecialchars($continent['name']);?>

                    </option>

                <?php endforeach?>


            
                </select>
            </div>
            
            <!-- Type Ville Input -->
            <div class="mb-4">
                <label for="type_Ville" class="block text-gray-600 font-medium mb-2">City Type:</label>
                <select id="type_Ville" name="type_Ville" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="capitale">Capital</option>
                    <option value="autre">Other</option>
                </select>
            </div>
            
            <!-- Image URL Input -->
            <div class="mb-4">
                <label for="Image" class="block text-gray-600 font-medium mb-2">Image URL:</label>
                <input type="text" id="Image" name="Image" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter the image URL" required>
            </div>
            
            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600 transition duration-300">Submit</button>
        </form>
    </div>
</body>
</html>

