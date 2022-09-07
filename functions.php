
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

function showpics() {
    echo "<form action ='index.php' method='post'>";
    $pics = scandir("pics/");
    for($i=2; $i<count($pics); $i++) {
        echo "<button name='motive' value='" . $pics[$i] . "'><img src='pics/" . $pics[$i] . "' title='" . $pics[$i] . "' style='width: 100px'></img></button><br>";
    }
    echo "</form>";
}

function uploadpic() {
    echo "<h3><b><u>Upload your own pic</u></b></h3>";
    echo "<form action ='index.php' method='post' enctype='multipart/form-data'>";
    echo "<p><input type='file' name='fileUpload'></p>";
    echo "<p><input type='submit' name='submit' value='Upload'></p>";
    echo "</form>";
}

function addpic() {
    if(isset($_POST['submit'])) {
        $target_dir = "pics/";
        $uploadFile = $target_dir . basename($_FILES["fileUpload"]["name"]);
        $type = strtolower(pathinfo($uploadFile,PATHINFO_EXTENSION));
        $upload = 0;

        //Check Image exists
        if(file_exists($uploadFile)) {
            echo "<p><b>File already exists!</p>";
            $upload++;
        }
        if($type != "jpg" && 
        $type != "jpeg" && 
        $type != "gif" && 
        $type != "png") {
            echo "<p><b>Only \"JPG\", \"JPEG\", \"PNG\" and \"GIF\" allowed.</p>";
            $upload++;
        }
        
        if($upload == 0) {
            move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $uploadFile);

            echo "<p><b>Image succesfully uploaded</b></p>";
            echo "<p><a href='index.php'><button>Please refresh your page</button></a></p>";
        }
    }
}

/*function addpic() {
    if(isset($_POST['submit'])) {
        $target_dir = "pics/";
        $uploadFile = $target_dir . basename($_FILES["fileUpload"]["name"]);
        $type = strtolower(pathinfo($uploadFile,PATHINFO_EXTENSION));
        $upload = 0;

        //Check Image exists
        if(file_exists($uploadFile)) {
            echo "<p><b>File already exists!</p>";
            $upload++;
        }
        if($type != "jpg" && 
        $type != "jpeg" && 
        $type != "gif" && 
        $type != "png") {
            echo "<p><b>Only \"JPG\", \"JPEG\", \"PNG\" and \"GIF\" allowed.</p>";
            $upload++;
        }
        
        if($upload == 0) {
            move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $uploadFile);
            echo "<p><b>Image succesfully uploaded</b></p>";
            echo "<p><a href='index.php'><button>Please refresh your page</button></a></p>";
        }
    }
}*/

function todelete() {
    echo "<h3><b><u>Delete pics</u></b></h3>";
    echo "<form action ='index.php' method='post'>";
    echo "<select name='file'>";
        $file = scandir("pics");
        for($i=2; $i<count($file); $i++) {
            echo "<option value='" . $file[$i] . "'>" . $file[$i] . "</option>";
        }
        echo "</select>";
        echo "<input type='submit' value='Delete' onclick=\"return confirm ('Are you sure?')\";>";
    echo "</form>";
}

function deletepic() {
    if(isset($_POST['file'])) {
        $file = $_POST['file'];
        unlink("pics/$file");
        echo "<p><b>Image succesfully deleted</b></p>";
        echo "<p><a href='index.php'><button>Please refresh your page</button></a></p>";
    }
}

?>


