<?php 
include('continent.php');

$continentObj = new Continent();

if (isset($_GET['id'])) {
    $continent_id = $_GET['id'];
    
    $continent = $continentObj->getContinentById($continent_id);
    
    if (!$continent) {
        echo "Continent not found.";
        exit;
    }
} else {
    echo "No continent ID provided.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $population = $_POST['population'];
    $image = $_POST['Image']; 
    $updateResult = $continentObj->updateContinent($continent_id, $name, $population, $image);

    if ($updateResult) {
        echo "Continent updated successfully!";
    } else {
        echo "Failed to update continent.";
    }
    header('Location: user.php');
}

?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Continent</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black">

  <!-- Navigation Bar (Optional) -->
  <nav class="bg-black p-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
      <a href="#" class="text-white text-2xl font-bold">Edit Continent</a>
      <div class="flex gap-[2rem]">
        <a href="user.php" class="text-white text-xl font-bold">Continents</a>
        <a href="index.php" class="text-white text-xl font-bold">Log out</a>
      </div>
    </div>
  </nav>

  <!-- Edit Continent Form -->
  <div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold mb-6">Edit Continent: <?= htmlspecialchars($continent['name']); ?></h2>

    <!-- Form to edit the continent details -->
    <form action="edit_continent.php?id=<?= htmlspecialchars($continent['id_continent']); ?>" method="POST" enctype="multipart/form-data">
      
      <div class="mb-6">
        <label for="name" class="block text-lg font-semibold">Continent Name</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($continent['name']); ?>" class="mt-2 p-2 w-full border rounded-md" required>
      </div>

      <div class="mb-6">
        <label for="population" class="block text-lg font-semibold">Population</label>
        <input type="text" id="population" name="population" value="<?= htmlspecialchars($continent['Nombre_pays']); ?>" class="mt-2 p-2 w-full border rounded-md" required>
      </div>

      <div class="mb-6">
        <label for="image" class="block text-lg font-semibold">Continent Image URL</label>
        <input type="text" id="image" name="Image" value="<?= htmlspecialchars($continent['Image']); ?>" class="mt-2 p-2 w-full border rounded-md" required>
      </div>

      <div>
        <button type="submit" name="submit" class="btn-primary py-2 px-4 rounded-md font-bold bg-black text-white">Update Continent</button>
      </div>
    </form>
  </div>

</body>
</html>
