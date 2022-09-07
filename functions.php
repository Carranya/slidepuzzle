
<?php
function crop() {
    if(isset($_POST['motive'])) {

        $motive = $_POST['motive'];
        copy("pics/$motive", "img/image.jpg");
        
        $img = imagecreatefromjpeg("img/image.jpg");
        $image = imagescale($img, 500);

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

                $newimg = imagecrop($image, ['x'=>$x,'y'=>$y, 'width'=>$width, 'height'=>$height]);
                imagejpeg($newimg, "img/" . $file . ".jpg");

                $x = $x+100;
            }
            $y = $y+100;
        }

        $empty = imagecreatetruecolor(100, 100);

        $color = imagecolorallocate($empty, 120, 190, 191);
        imagefill($empty, 0, 0, $color);

        imagejpeg($empty, "img/25.jpg");
        
        imagedestroy($newimg);
        imagedestroy($empty);
    
    }
}

?>
