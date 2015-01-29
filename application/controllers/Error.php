<?php

class Error extends Controller {

    public function Index($message) {
        $this->view->render("error.index", array("error", $message));
    }

} 