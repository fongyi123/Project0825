<?php

class BlogController extends Controller {
    
    function index() {
        echo "home page of BlogController";
    }
    
    function list($name){
        // echo "$name";
        // $name呼叫/list/這個資料夾類別之後的網址名
        $user = $this->model("User");
        $user->name = $name;
        $this->view("Home/hello", $user);
    }

    // function Blog($name) {
    //     echo "Hello! $name";
    // }
    
}

?>