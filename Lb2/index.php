<?php
    if (isset($_GET['search'])) {
        $apiKey = 'AIzaSyD7c9vwXunGZjyoKsyj7uTlv4ws00OqBmQ';
        $searchEngineId = '14e8b145752354bdf';
        $search = $_GET['search'];
        $url = 'https://www.googleapis.com/customsearch/v1?key=' . $apiKey . '&cx=' . $searchEngineId . '&q=' . urlencode($search);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);
        $items = $result['items'];
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Halahan Kirill Lb2</title>
        <link rel="stylesheet" href="./style.css"
    </head>
    <body>
    <h2>My Browser</h2>
    <form method="GET" action="index.php">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" value=""><br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($items)) {
        foreach ($items as $item) {
            echo '<h3>' . $item['title'] . '</h3>';
            echo '<a href="' . $item['link'] . '">' . $item['link'] . '</a>';
            echo '<p>' . $item['snippet'] . '</p>';
        }
    }
    ?>
    </body>
</html>
