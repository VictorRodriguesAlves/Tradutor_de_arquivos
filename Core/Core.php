<?php
class Core {

    public function run()
    {
        $controller = "homeController";
        $action = "index";
        $param = array();
        $url = "/";
        if(isset($_GET['url'])){
            $url .= $_GET['url'];
            $url = explode("/", $url);
            array_shift($url);
            $controller = $url[0]."Controller";
            array_shift($url);

            if(sizeof($url) > 0 && !empty($url[0])){

                $action = $url[0];
                array_shift($url);

                if(sizeof($url) > 0 && !empty($url[0])){
                    $param = $url;
                }

            }

        }

        try {
            $c = new $controller;
            call_user_func_array(array($c, $action), $param);
        } catch (Throwable $e) {
            require("View/notFound.php");
        }
    }

}