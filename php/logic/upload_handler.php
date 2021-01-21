<?php
class gestImg{
    public function uploadImage($folder,$input_name){
        $target_dir = $folder;
        $target_file = $target_dir . basename($_FILES[$input_name]["name"]);
        $uploadOk = 1;
        $error="";
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES[$input_name]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $error= $error."[Questo file non e una immagine]";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES[$input_name]["size"] > 5000000) {//5MB
                $error= $error."[Il file è troppo grande carica un file di dimensione minore di 500kB]";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $error= $error."[Si possono caricale solo file JPG JPEG PNG e GIF]";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 1) {
                $temp = explode(".", $_FILES[$input_name]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                $target_file=$target_dir .$newfilename;
                if (!move_uploaded_file($_FILES[$input_name]["tmp_name"], $target_file)) {
                    $error= "[errore nel caricamento del file.]";
                }
            }
        $toReturn['error']=$error;
        $toReturn['path']=$target_file;
        return $toReturn;
    }

    public function deleteImage($path){
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
?>