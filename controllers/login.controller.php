<?php 

class ControllerLogin{

    static public function ctrAuthenticateLogin($data){
        $answer = (new ModelLogin)->Login($data);
    }
}

?>