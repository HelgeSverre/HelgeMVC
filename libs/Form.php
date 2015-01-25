<?php



// TODO: add option to use array instead of multiple params
// TODO: add file input function



class Form {

    private $form;


    /**
     * @param string $action the form action
     * @param string $method the form submission method
     * @param string $id optional, adds an ID attribute to the form tag
     * @param string $class optional, adds a CLASS attribute to the form tag
     */
    public function __construct($action, $method, $id = null, $class = null) {

        $tmp = "\n<form";

        if (isset($action))
            $tmp .= " action='" . $action . "'";

        if (isset($method))
            $tmp .= " method='" . strtoupper($method) . "'";

        if (isset($id))
            $tmp .= " id='" . $id . "'";

        if (isset($class))
            $tmp .= " class='" . $class . "'";

        $tmp .= ">";

        $this->form = $tmp;
    }


    /**
     * @param string $text the text to display inside the label tag
     * @param string $for optional, adds a FOR attribute to the label tag.
     * @param string $id optional, adds an ID attribute to the label tag.
     * @param string $class optional, adds a CLASS attribute to the label tag.
     */
    public function addLabel($text, $for = null, $id = null, $class = null) {

        $tmp = "\n\t<label";

        if (isset($for))
            $tmp .= " for='" . $for . "'";

        if (isset($id))
            $tmp .= " id='" . $id . "'";

        if (isset($class))
            $tmp .= " class='" . $class . "'";

        $tmp .= ">" . $text . "</label>";

        $this->form .= $tmp;
    }


    /**
     * @param string $type the type of input field you want to add
     * @param string $name the name attribute for the input field
     * @param string $placeholder placeholder attribute for the input fields
     * @param string $value the value attribute for the input field
     * @param string $id the id attribute for the input field
     * @param string $class the class attribute for the input field
     */
    public function addInput($type, $name, $placeholder = null, $value = null,  $id = null, $class = null) {

        $tmp = "\n\t<input";

        if (isset($type))
            $tmp .= " type='" . $type . "'";

        if (isset($name))
            $tmp .= " name='" . $name . "'";

        if (isset($placeholder))
            $tmp .= " placeholder='" . $placeholder . "'";

        if (isset($value))
            $tmp .= " value='" . $value . "'";

        if (isset($id))
            $tmp .= " id='" . $id . "'";

        if (isset($class))
            $tmp .= " class='" . $class . "'";

        $tmp .= " />";

        $this->form .= $tmp;
    }


    /**
     * @param string $name optional, name of the input submit tag.
     * @param string $value optional, the value of the input tag (The text on the button).
     * @param string $id optional, give the input tag an ID
     * @param string $class optional, give the input tag a CLASS
     */
    public function addSubmit($name = null, $value = null,  $id = null, $class = null) {
        $this->addInput("submit", $name, $placeholder = null, $value = $value,  $id, $class);
    }


    /**
     * Convenience function to insert line break.
     */
    public function addBr() {
        $this->form .= "\n<br />";
    }


    /**
     * @return string displays the form, call this when you've added all your inputs.
     */
    public function display() {
        $this->form .= "\n</form>\n";
        return $this->form;
    }

}

