<?php


class View {

    private $data = array();


    /**
     * @param string $name example: "about.index" will load the index.php file inside the about directory
     */
    public function render($name, $data = null) {

        // translate fancy dot seperators to slashes so it can be used for file paths.
        $name = str_replace(".","/",$name);

        // build the filepath
        $filepath = VIEWS_PATH . $name . ".php";

        // include the file if it exists
        if (file_exists($filepath)) {

            // The file exists, let's set the data passed to the view if it exists.
            if ($data) {
                extract($data);
            }

            include $filepath;
        } else {
            throw new Exception("View file not found");
        }
    }


    /**
     * @deprecated 1.1 Should no longer be used, pass an associative array as the 2nd parameter to the render function instead.
     * @param string $key the data to retrieve
     * @return mixed the data
     */
    public function getData($key) {
        return $this->data[$key];
    }


    /**
     * @deprecated 1.1 Should no longer be used, pass an associative array as the 2nd parameter to the render function instead.
     * @param string $key the key to store the value as
     * @param string $value the value to be stored.
     */
    public function setData($key, $value) {
        $this->data[$key] = $value;
    }

} 
