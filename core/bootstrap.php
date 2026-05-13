<?php

define('APP_ROOT', dirname(__DIR__));

require_once APP_ROOT . '/core/Database.php';
require_once APP_ROOT . '/core/View.php';

require_once APP_ROOT . '/helpers/Formatter.php';
require_once APP_ROOT . '/helpers/UrlHelper.php';

require_once APP_ROOT . '/models/ProductModel.php';

require_once APP_ROOT . '/controllers/ProductController.php';
require_once APP_ROOT . '/controllers/HomeController.php';

View::init(APP_ROOT . '/views');
