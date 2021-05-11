<?php
    session_start();
    date_default_timezone_set('America/Cancun');
    chdir('../controllers');
    require("controller.php");
    $control = new Controller();
    $response['success'] = false;
    $response['error'] = null;
    try {
        // Image file attr
        $img_file = $_FILES["image"]["name"];
        $size = $_FILES["image"]['size'];
        $type = $_FILES["image"]['type'];
        $tmp = $_FILES["image"]["tmp_name"];
        // $control
        $path = "./uploads/". $img_file;
        $form = [
            ':iduser' => $_SESSION['id'],
            ':title' => $_POST['title'],
            ':imgpath' => $path,
            ':des' => $_POST['description'],
            ':cont' => $_POST['content'],
            ':dt' => date('F j, Y \a\t h:i:s A'),   
        ];
        // Valid image extension
        $valid_extension = array("image/png","image/jpeg","image/jpg");
        if(in_array($type, $valid_extension)){
            $id = $control->Add_new_post($form);
            $ext = explode("/", $type);
            $newpath = "./uploads/ID-" . $id . "." . $ext[1];
            if(!file_exists($newpath)){ // Check if already exists
                if($size < 5000000){ // Check image size
                    move_uploaded_file($tmp, $newpath);
                    $control->Update_path_Img($newpath, $id);
                    $response['postid'] = $id;
                    $response['success'] = true;
                    $response['message'] = "Done!";
                }
                else{
                    $response['message'] = "Too big!";
                }
            }else{
                $response['message'] = "This image alredy exits!";
            }
        }else{
            $response['message'] = "Invalid file extension, 
                only images png, jpeg, jpg!";
        }
    }
    catch (\Error $e) {
        $response['error'] = $e->getMessage();
    }
    $control->Close_Connection();
    echo json_encode($response);
?>