<?php
    session_start();
    date_default_timezone_set('America/Cancun');
    chdir('../controllers');
    require("controller.php");
    $control = new Controller();
    $response['success'] = false;
    $response['error'] = null;
    try {
        $id = $_POST["idpost"];
        $form = [
            ":idpost" => $id,
            ":iduser" => $_SESSION['id'],
            ":comment" => $_POST['comment'],
            ":dt" => date('F j, Y \a\t h:i:s A'),
        ];
        $control->Add_new_comment($form);
        $response['comments'] = $control->Create_comment_section($id);
        $response['success'] = true;
        $response['message'] = "Done!";        
    }
    catch (\Error $e) {
        $response['error'] = $e->getMessage();
    }
    $control->Close_Connection();
    echo json_encode($response);
?>