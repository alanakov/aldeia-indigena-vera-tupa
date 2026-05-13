<?php

require_once '../core/bootstrap.php';

$controller = new HomeController();
$data       = $controller->index();

View::render('home', $data);
