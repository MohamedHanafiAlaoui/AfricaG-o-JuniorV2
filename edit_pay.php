<?php
include('pays.php');

$continentObj = new pays();

if (isset($_GET['id'])) {
    $continentId = $_GET['id'];
    $continent = $continentObj->getContinentById($continentId);
    if (!$continent) {
        echo "Continent not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission to update the continent
    $name = $_POST['name'];
    $population = $_POST['population'];
    $image = $_POST['Image'];

    $continentObj->updateContinent($continentId, $name, $population, $image);

    header("Location: userpays.php"); // Redirect to the list page after updating
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Continent</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="max-w-2xl mx-auto my-12 bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Edit Continent</h2>
    
    <!-- Form -->
    <form method="POST" action="edit_pay.php?id=<?= $continentId; ?>" class="space-y-6">
      
      <!-- Continent Name -->
      <div>
        <label for="name" class="block text-lg font-medium text-gray-600">Continent Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($continent['name']); ?>" required
               class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      
      <!-- Population -->
      <div>
        <label for="population" class="block text-lg font-medium text-gray-600">Population:</label>
        <input type="text" name="population" value="<?= htmlspecialchars($continent['population']); ?>" required
               class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      
      <!-- Image URL -->
      <div>
        <label for="image" class="block text-lg font-medium text-gray-600">Image URL:</label>
        <input type="text" name="image" value="<?= htmlspecialchars($continent['Image']); ?>" required
               class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Submit Button -->
      <div class="flex justify-center">
        <button type="submit" name="submit" class="w-48 py-3 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Update Continent
        </button>
      </div>

    </form>
  </div>

</body>
</html>

