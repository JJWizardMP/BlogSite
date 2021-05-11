<?php
    chdir('../models');
    require("user-model.php");
    $User = new UserModel();
    $response['success'] = false;
    $response['error'] = null;
    try {
        $form = [
            ':name' => $_POST['name'],
            ':user' => $_POST['user'],
            ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),        
        ];
        $query = $User->get_row($form);
        if($query['n_rows']>0){
            $response['message'] = "Username Already Taken!";
        }
        else{
            session_start();
            $response['success'] = true;
            $response['message'] = 'User Added Successfully!';
            $User->add_row($form);
            $query = $User->get_row($form);
            // assing session values
            $_SESSION['id'] = $query["record"]["ID_User"];
            $_SESSION['name'] = $query["record"]['Name'];
            $_SESSION['username'] = $query["record"]['Username'];
        }
    }
    catch (\Error $e) {
        $response['success'] = false;
        $response['error'] = $e->getMessage();
    }
    $User->close();
    echo json_encode($response);
?>