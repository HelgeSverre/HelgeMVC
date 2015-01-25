<?php

/*
 * DATABASE CONFIGURATION
 */
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mvctest');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');


/*
 * SYSTEM PATH CONFIGURATION
 */
define('CONTROLLERS_PATH', 'controllers/');
define('MODELS_PATH', 'models/');
define('VIEWS_PATH', 'views/');
define('PARTIALS_PATH', VIEWS_PATH . 'partials/');

/*
 * MEDIA PATH CONFIGURATION
 */
define('STYLESHEETS_PATH', 'public/css/');
define('SCRIPTS_PATH', 'public/js/');
define('IMAGES_PATH', 'public/img/');

/*
 * DEFAULT CONTROLLER CONFIGURATION
 */
define("DEFAULT_CONTROLLER", "Home");