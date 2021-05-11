<?php
    chdir('../controllers');
    require("controller.php");
    $control = new Controller();
    $response['success'] = false;
    $response['error'] = null;
    try {
        $id = $_POST["id"];
        $response['post'] = $control->Create_post($id);
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