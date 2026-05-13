<?php

require_once '../core/bootstrap.php';

$controller = new ProductController();
$data       = $controller->listProducts();

View::render('produtos', $data);
