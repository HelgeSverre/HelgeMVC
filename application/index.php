<?php

// TODO: Autoload classes in libs directory
require 'libs/Config.php';
require 'libs/Bootstrap.php';
require 'libs/Database.php';
require 'libs/Helper.php';
require 'libs/Session.php';
require 'libs/Form.php';
require 'libs/Flash.php';

require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';

// initialize the application
$app = new Bootstrap();
