<?php

function post_img($tmp_name, $extension){
    $db = GetDBConnection();

    $id = $db->lastInsertId();
    $i = [
        'id'    =>  $id,
        'image' =>  "head_".$id.$extension      //$id = 25 , $extension = .jpg      $id.$extension = "25".".jpg" = 25.jpg
    ];

    $sql = "UPDATE portfolio SET image = :image WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($i);
    move_uploaded_file($tmp_name,"../img/posts/"."head_".$id.$extension);
    $req->closeCursor();
    $db = null;
}


    function input($id){
        $value = isset($_POST[$id]) ? $_POST[$id] : '';
        return "<input type='text' class='form-control' id='$id' name='$id' value='$value'>";
    }
    function textarea($id){
        $value = isset($_POST[$id]) ? $_POST[$id] : '';
        return "<textarea type='text' class='form-control' id='$id' name='$id'>$value</textarea>";
    }

    function select($id, $options = array()){
        $return = "<select class='form-control' id='$id' name='$id'>";
        foreach($options as $k => $v){
            $selected = '';
            if(isset($_POST[$id]) && $k == $_POST[$id]){
                $selected = ' selected="selected"';
            }
            $return .= "<option value='$k' $selected>$v</option>";
        }
        $return .= '</select>';
        return $return;
}

    function flash(){
        if(isset($_SESSION['Flash'])){
            extract($_SESSION['Flash']);
            unset($_SESSION['Flash']);
            return "<div class='alert alert-$type'>$message</div>";
        }
    }

    function setFlash($message, $type = 'success'){
        $_SESSION['Flash']['message'] = $message;
        $_SESSION['Flash']['type'] = $type;
    }

    
    function resizedName($file, $width, $height){
        $info = pathinfo($file);
        $return = '';
        if($info['dirname'] != '.'){
            $return .= $info['dirname'] . '/';
        }
        $return .= $info['filename'] . "_$width". "x$height." . $info['extension'];
        return $return;
    }

        function resizeImage($file, $width, $height){
            # We find the right file
            $pathinfo   = pathinfo(trim($file, '/'));
            $output     = $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '_' . $width . 'x' . $height . '.' . $pathinfo['extension'];

            # Setting defaults and meta
            $info                         = getimagesize($file);
            list($width_old, $height_old) = $info;

            # Create image ressource
            switch ( $info[2] ) {
                case IMAGETYPE_GIF:   $image = imagecreatefromgif($file);   break;
                case IMAGETYPE_JPEG:  $image = imagecreatefromjpeg($file);  break;
                case IMAGETYPE_PNG:   $image = imagecreatefrompng($file);   break;
                default: return false;
            }

            # We find the right ratio to resize the image before cropping
            $heightRatio = $height_old / $height;
            $widthRatio  = $width_old /  $width;

            $optimalRatio = $widthRatio;
            if ($heightRatio < $widthRatio) {
                $optimalRatio = $heightRatio;
            }
            $height_crop = ($height_old / $optimalRatio);
            $width_crop  = ($width_old  / $optimalRatio);

            # The two image ressources needed (image resized with the good aspect ratio, and the one with the exact good dimensions)
            $image_crop = imagecreatetruecolor( $width_crop, $height_crop );
            $image_resized = imagecreatetruecolor($width, $height);

            # This is the resizing/resampling/transparency-preserving magic
            if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
                $transparency = imagecolortransparent($image);
                if ($transparency >= 0) {
                    $transparent_color  = imagecolorsforindex($image, $trnprt_indx);
                    $transparency       = imagecolorallocate($image_crop, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
                    imagefill($image_crop, 0, 0, $transparency);
                    imagecolortransparent($image_crop, $transparency);
                    imagefill($image_resized, 0, 0, $transparency);
                    imagecolortransparent($image_resized, $transparency);
                }elseif ($info[2] == IMAGETYPE_PNG) {
                    imagealphablending($image_crop, false);
                    imagealphablending($image_resized, false);
                    $color = imagecolorallocatealpha($image_crop, 0, 0, 0, 127);
                    imagefill($image_crop, 0, 0, $color);
                    imagesavealpha($image_crop, true);
                    imagefill($image_resized, 0, 0, $color);
                    imagesavealpha($image_resized, true);
                }
            }

            imagecopyresampled($image_crop, $image, 0, 0, 0, 0, $width_crop, $height_crop, $width_old, $height_old);
            imagecopyresampled($image_resized, $image_crop, 0, 0, ($width_crop - $width) / 2, ($height_crop - $height) / 2, $width, $height, $width, $height);


            # Writing image according to type to the output destination and image quality
            switch ( $info[2] ) {
            case IMAGETYPE_GIF:   imagegif($image_resized, $output, 80);    break;
            case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, 80);   break;
            case IMAGETYPE_PNG:   imagepng($image_resized, $output, 9);    break;
            default: return false;
            }

            return true;
        }

