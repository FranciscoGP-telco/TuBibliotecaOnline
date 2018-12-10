<?php
print_r('<div class="addBook tbo-cream w3-padding-large">');
    //Checkin if we have the post info
    if(isset($_POST["ISBN"])){
        $ISBN = $_POST["ISBN"];
        //Comprobations to upload the front
        //First, we check the format
        $fileType = strtolower(pathinfo($_FILES["uploadform"]["name"],PATHINFO_EXTENSION));
    
        if($fileType != "jpg" && $fileType != "png") {
            print_r ("<p>Error! Solo puedes añadir portadas en formato .jpg o .png</p>");
            $uploadTest = false;
        } else {
          $target_file = "img/" . basename($ISBN . ".png");
          $uploadTest = true;
        }
    
        // Then the maximum file size
        if ($_FILES["uploadform"]["size"] > 500000) {
            print_r ("<p>Error! No se ha añadido la portada. No puede tener un tamaño mayor a 5 megas</p>");
            $uploadTest = false;
        }
    
        // Check if $uploadTest is false
        if ($uploadTest == false) {
            print_r ("<p>Error! No se ha subido la imagen.</p>");
        // If is true, try to upload file
        } else {
            if (move_uploaded_file($_FILES["uploadform"]["tmp_name"], $target_file)) {
                print_r ('<p>La portada ha sido actualizada:</p><br/>
                <img src="img/'.$ISBN.'.png" alt="'.$ISBN.'" class="bookCoverSmall" id="'.$ISBN.'">');
            } else {
                print_r ("<p>Error! No se ha podido añadir la portada.</p>");
            }
        }
    } else {
        print_r ("<p>Error! debes añadir una portada desde la página del libro!</p>");
    }
    print_r ("</div>");
?>