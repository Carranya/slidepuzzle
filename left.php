<h2><u>Choose Image</u></h2>
<?php
    echo "<form action ='index.php' method='post'>";
    $pics = scandir("pics/");
    for($i=2; $i<count($pics); $i++) {
        echo "<button name='motive' value='" . $pics[$i] . "'><img src='pics/" . $pics[$i] . "' style='width: 100px'></img></button><br>";
    }
    echo "</form>";
?>
