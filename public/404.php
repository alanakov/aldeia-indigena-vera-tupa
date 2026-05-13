<?php

require_once '../core/bootstrap.php';

http_response_code(404);
View::render('404');
