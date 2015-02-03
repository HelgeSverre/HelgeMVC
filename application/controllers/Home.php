<?php

class Home extends Controller
{

    public function Index()
    {
        $this->loadModel("home");
        $name = $this->home->getName();

        $this->view->render("home.index", array(
            "product_name" => $name
        ));
    }

}