<?php

require_once './src/Class/conect_db.php'; 
?>

<!DOCTYPE html>
<html lang="en">php
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f3f4f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 500px;
            width: 100%;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        input[type="url"],
        textarea,
        select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 0.875rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type="text"]:focus,
        input[type="url"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .url-hint {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.25rem;
        }

        .submit-button {
            display: block;
            width: 100%;
            padding: 0.75rem;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .submit-button:hover {
            background-color: #2563eb;
        }

        .submit-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.4);
        }

        @media (max-width: 640px) {
            .form-container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Data Entry Form</h2>
        
        <form action="./src/Controllers/AjouterVille.php" method="post">
            <div class="form-group">
                <label for="nom">Name</label>
                <input type="text" id="name" name="nom" required>
            </div>

            <div class="form-group">
                <label for="vill_descreption">Description</label>
                <textarea id="description" name="vill_descreption" required></textarea>
            </div>

            <div class="form-group">
                <label for="paysID">Country</label>
                <input type="text" id="id_pays" name="paysID" required>
                <select id="id_pays" name="id_pays" required>
                    <option value="">Select a type</option>
                    <option value="capitale">capitale</option>
                </select>
            </div>

            <div class="form-group">
                <label for="type">City Type</label>
                <select id="type_Ville" name="type" required>
                    <option value="">Select a type</option>
                    <option value="capitale">capitale</option>
                    <option value="autre">autre</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image URL</label>
                <input type="url" id="image" name="image" placeholder="https://example.com/image.jpg" required>
                <div class="url-hint">Enter the full URL of the image</div>
            </div>

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
</body>
</html>
