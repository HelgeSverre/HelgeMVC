<?php

class Home extends Controller {

    public function Index() {

        $this->loadModel("Home");

        $hello = $this->model->getHello();

        $this->view->render("home.index", array("hello" => $hello));
    }

}