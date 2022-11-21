<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!isset($_SESSION['login'])){
        echo "only admins can upload <br> kindly login";
        exit();
    }else{
        $fd_name =$_POST['fd_name'];
        $$categry =$_POST['category'];
        $price =$_POST['price'];
        $categry_id = " ";

        if (!isset($_FILES['url_image']['tmp_name'])){
            echo "no image selected <br>select image";
        }else {
            $file = $_FILES['url_image']['tmp_name'];
            $image_size =getimagesize($file);
            if ($image_size == false){
                echo "file uploaded not an image <br> please uplad jpg png &jpeg files";

            }else {
                $filepath = addslashes($_FILES['url_image']['name']);
                $location = move_uploaded_file($file ,"c/apche24/httdocs/loaded/img/" . $filepath );  
            }
        }
        include('dbconnect.php');
        $update =$conn->query("INSERT INTO  'food_menu' ('food_name','category_id' ,'category_name','price','url_image')
                         VALUES ('$fd_name' ,'$category_id','$category','$price','$location')");
        echo"upload successfull";
        
    }
}else{
    echo "could not upload product";
}
?>