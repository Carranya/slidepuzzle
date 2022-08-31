<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset='utf-8'>
    <title>Imagecrop</title>
</head>
<body>
<?php
    $img = imagecreatefromjpeg("img/sm.jpg");
    $image = imagescale($img, 500, 500);
    imagejpeg($image, "img/komplett.jpg");
    $file = 0;
    $y=0;

    for($rows=1; $rows<=5; $rows++)
    {
        $x=0;

        for($cols=1; $cols<=5; $cols++)
        {
            $file++;
            
            $width = 100;
            $height = 100;

            echo "x=$x, y=$x, width=$width, height=$height<br>";
            $newimg = imagecrop($image, ['x'=>$x,'y'=>$y, 'width'=>$width, 'height'=>$height]);
            imagejpeg($newimg, "img/" . $file . ".jpg");

            $x = $x+100;
        }
        $y = $y+100;
    }
    

    

?>
</body>
</html>