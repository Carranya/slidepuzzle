<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Puzzle</title>
    <link rel="stylesheet" href="slide.css">
    <script src="slide.js"></script>
</head>
<body>
    <?php
    require_once("functions.php");
    
    echo "<div class='head'>";
    echo "<h1><i>Slide Puzzle</i></h1>";
    echo "</div>";
    
    echo "<div class='main'>";
        echo "<div class='left'>";
                crop();
                include "left.php"; 
        echo "</div>";

        echo "<div class='content'>";
            echo "<div id='board'></div>";
            echo "<h2>Turns: <span id='turns'>0</span></h2>";
        echo "</div>";

        echo "<div class='right'>";

        echo "</div>";
    echo "</div>";
    echo "<div class='foot'>";
        echo "<p>Version 1.0</p>";
    echo "</div>";
    ?>
</body>
</html>