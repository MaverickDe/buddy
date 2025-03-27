<?php

session_start();

$router = require './src/routing/routes.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map with User Location and Custom Marker</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 500px; width: 100%; }
    </style>
</head>
<body>
  

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</body>
</html>
