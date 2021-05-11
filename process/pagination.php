<?php
    chdir('../controllers');
    require("controller.php");
    $control = new Controller();
    $response['success'] = false;
    $response['error'] = null;
    if(isset($_POST["page"])){  
         $page = $_POST["page"];  
    }else{  
         $page = 1;  
    }  
    try {
        $response['success'] = true;
        $response['message'] = 'Done!';
        $output = $control->Create_pagination($page);
        $response['section'] = $output['section'];
        $response['pager'] = $output["pager"];
    }
    catch (\Error $e) {
        $response['error'] = $e->getMessage();
    }
    $control->Close_Connection();
    echo json_encode($response);
?>