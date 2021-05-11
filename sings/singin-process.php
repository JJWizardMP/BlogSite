<?php
    chdir('../models');
    require("user-model.php");
    $User = new UserModel();
    $response['success'] = false;
    $response['error'] = null;
    try {
        $form = [
            ':user' => $_POST['user'],
            ':password' => $_POST['password'],        
        ];
        $query = $User->get_row($form);
        if($query['n_rows']>0){
            if( ($form[':user']==$query['record']['Username']) && 
                (password_verify($form[':password'], $query['record']['Password']))){
                    session_start();
                    $response['success'] = true;
                    $response['message'] = 'User Sing In Successfully!';
                    // assing session values
                    $_SESSION['id'] = $query["record"]["ID_User"];
                    $_SESSION['name'] = $query["record"]['Name'];
                    $_SESSION['username'] = $query["record"]['Username'];

            }else{
                $response['message'] = "Invalid User or Password!";
            }
        }
        else{
            $response['message'] = "User Does Not Exist!";
        }
    }
    catch (\Error $e) {
        $response['success'] = false;
        $response['error'] = $e->getMessage();
    }
    $User->close();
    echo json_encode($response);
?>