<?php
$con = require 'core/bootstrap.php';
$router = new Router;
require 'route.php';
// require "404.php";
require $router->direct(
  trim($_SERVER['REQUEST_URI'], '/')
);
