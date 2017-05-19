<?php
$con = require 'core/bootstrap.php';
$router = new Routes;
require 'route.php';
require $router->direct(
  trim($_SERVER['REQUEST_URI'], '/')
);
