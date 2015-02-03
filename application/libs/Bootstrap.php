<?php

/**
 * Class Bootstrap
 * responsible for calling the controllers based on the url string entered
 */
class Bootstrap
{

    public function __construct()
    {

        // If no route is specified, load the default controller
        if (!isset($_GET["url"])) {

            include CONTROLLERS_PATH . DEFAULT_CONTROLLER . ".php";


            // Instantiate a new controller object.
            $defaultController = DEFAULT_CONTROLLER;
            $controller = new $defaultController();


            // If the __remap function exists, always call it.
            if (method_exists($controller, "__remap")) {
                $controller->__remap();
            }

            // Load the Index function in the controller by default.
            $controller->Index();

        } else {

            // Filter any unwanted characters from the URL
            $url = filter_var($_GET["url"], FILTER_SANITIZE_URL);

            // Trim trailing slashes and explode into array.
            $url = rtrim($url, "/");
            $url = explode("/", $url);

            // Build the filepath to the controller
            $file = CONTROLLERS_PATH . $url[0] . ".php";


            // check if the controller exists
            if (file_exists($file)) {

                // Include the controller
                include($file);
                $controller = new $url[0];

                // unset the controller from the url array
                unset($url[0]);

                // If an url fragment for a controller function is present
                if (isset($url[1])) {

                    if (method_exists($controller, $url[1])) {

                        // If __remap() exists, call it.
                        if (method_exists($controller, "__remap")) {
                            $function = "__remap";
                        } else {
                            $function = $url[1];
                        }


                        // unset the method array item
                        unset($url[1]);

                        // call the method inside the controller with the remaining url array.
                        call_user_func_array(array($controller, $function), $url);

                    } else {
                        throw new Exception("method " . $url[1] . "() does not exist in " . $file);
                    }
                } else {
                    // If __remap() exists, call it.
                    if (method_exists($controller, "__remap")) {
                        $controller->__remap();
                    }

                    // if there is no method specified, load Index
                    $controller->Index();
                }
            } else {
                // if the controller does not exist, throw an exception.
                throw new Exception("Controller file: " . $file . " does not exist.");
            }
        }
    }
}