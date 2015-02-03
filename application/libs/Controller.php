<?php


/**
 * Class Controller
 * Responsible for allowing the user to load models, this class also loads the view and session class.
 */
class Controller
{

    /**
     * The constructor initializes an instance of the session and view class.
     */
    function __construct()
    {
        $this->view = new View();
        $this->session = new Session();
    }


    /**
     * Load a model
     * @param string $name the name of the model without the _Model suffix.
     * @param bool $loadDB load the database class in the constructor of the model class?
     */
    public function loadModel ($name, $loadDB = false) {

        $path = strtolower(MODELS_PATH . $name . "_model.php");

        if (file_exists($path)) {
            require $path;
            $modelName = $name . "_Model";
            $this->$name = new $modelName($loadDB);

        }
    }
}