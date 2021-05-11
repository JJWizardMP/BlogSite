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
            ":idcomment" => $_POST['idcomment'],
            ":iduser" => $_SESSION['id'],
            ":idpost" => $id,
            ":reply" => $_POST['reply'],
            ":dt" => date('F j, Y \a\t h:i:s A'),
        ];
        $control->Add_new_reply($form);
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