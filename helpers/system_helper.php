<?php

//Redirect page
    function redirect($page = FALSE, $message = NULL, $message_type = NULL){
        if(is_string($page)){
            $location = $page;
        }else{
            $location = $_SERVER['SCRIPT_NAME'];
        }

        //check for messsage
        if($message != NULL){
            //set Message
            $_SESSION['message'] = $message;
        }

        //check for type
        if($message_type != NULL){
            //set Message type
            $_SESSION['message_type'] = $message_type;
        }

        //Redirect
        header('Location: '. $location);
        exit;
    }

    //Display Message and unset $_SESSION
    function displayMessage(){

        if(!empty($_SESSION['message'])){

            //assign Message var
            $message = $_SESSION['message'];

            if(!empty($_SESSION['message_type'])){
                //Assign type vare
                $message_type = $_SESSION['message_type'];
                //create output
                if($message_type == 'error'){
                    echo '<div class="alert alert-danger">' . $message . '</div>';
                } else{
                    echo '<div class="alert alert-success">' . $message . '</div>';
                }
            }
            //unset message
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        
        }else{
            echo '';
        }
    }