<?php


class Controller {

    function __construct() {
        $this->view = new View();
        $this->session = new Session();
    }


    /**
     * Load a model
     * @param string $name the name of the model without the _Model suffix.
     */
    public function loadModel ($name) {

        $path = MODELS_PATH . $name . "_Model.php";

        if (file_exists($path)) {
            require $path;
            $modelName = $name . "_Model";
            $this->model = new $modelName();

        }
    }



}