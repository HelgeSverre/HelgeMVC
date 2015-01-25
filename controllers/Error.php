<?php

class Error extends Controller {

    public function Index($message) {
        $this->view->setData("error", $message);
        $this->view->render("error.index");
    }

} 