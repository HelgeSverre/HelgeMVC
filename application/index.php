<?php

// TODO: Autoload classes in core directory
require './core/Config.php';
require './core/Bootstrap.php';
require './core/Database.php';
require './core/Helper.php';
require './core/Session.php';
require './core/Form.php';
require './core/Flash.php';

require './core/Controller.php';
require './core/Model.php';
require './core/View.php';

// initialize the application
$app = new Bootstrap();
