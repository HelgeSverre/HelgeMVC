<?php

class Home extends Controller {

    public function Index() {
        $this->view->render("home.index");
    }

}