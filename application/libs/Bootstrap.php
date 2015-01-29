<?php

/**
 * Class Bootstrap
 * responsible for calling the controllers based on the url string entered
 */
class Bootstrap {

    // the constructor of the bootstrap class, runs the entire app.
    public function __construct() {

        // If the URL Get variable is not set, load the default controller
        if (!isset($_GET["url"])) {

            include CONTROLLERS_PATH . DEFAULT_CONTROLLER  . ".php";

            // Instantiate a new controller object.
            $controller = new Home();


            // If the __remap function exists, always call it.
            if (method_exists($controller, "__remap")) {
                $controller->__remap();
            }

            // Load the Index function in the controller by default.
            $controller->Index();

        } else {

            // Filter out any unwanted characters from the URL
            $url = filter_var($_GET["url"], FILTER_SANITIZE_URL);

            // Trim trailing slashes.
            $url = rtrim($url, "/");

            // Explode the URL into an array.
            $url = explode("/", $url);

            // Build the filepath to the controller
            $file =  CONTROLLERS_PATH . $url[0] . ".php";


            // check if the controller exists
            if (file_exists($file)) {

                // Include the controller file
                include($file);

                // instantiate a new controller object from the included controller file.
                $controller = new $url[0];

                // unset the controller from the url array
                unset($url[0]);

                // If an url fragment for a controller function is present
                if (isset($url[1])) {

                    if (method_exists($controller, $url[1])) {

                        // If the __remap function exists, always call it.
                        if (method_exists($controller, "__remap")) {
                            $function = "__remap";
                        } else {
                            $function = $url[1];
                        }


                        // unset the function array item
                        unset($url[1]);

                        // call the function inside the controller with the remaining url array.
                        call_user_func_array(array($controller, $function), $url);

                    } else {
                        $this->Error("The function: <b>" . $url[1] . "()</b> does not exist in controller: <b>" . $file . "</b>");
                    }
                } else {
                    // If the __remap function exists, always call it.
                    if (method_exists($controller, "__remap")) {
                        $controller->__remap();
                    }

                    // if there is no function specified, load the Index() function.
                    $controller->Index();
                }
            } else {
                // if the controller does not exist, load an error controller.
                $this->Error("The controller file: <b>" . $file . "</b> does not exist, check for typos.");
            }
        }
    }


    /**
     * The error class, gets called if an error occurs.
     * @param string $message the error message to display in the error view.
     */
    static function Error($message) {

        $filepath = CONTROLLERS_PATH . "Error.php";
        if (file_exists($filepath)) {

            include $filepath;

            $controller = new Error();
            $controller->Index($message);
        } else {
            throw new Exception("Error controller does not exist, either it has been deleted or config file is wrong.");
        }

    }

}