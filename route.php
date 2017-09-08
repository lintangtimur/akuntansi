<?php
$router->register([
  "404" => "controller/404.php"
]);

//POST
$router->post('loginproses', 'controller/logproses.php');
$router->post('reportrinci', 'controller/reportrinci.php');
$router->post('nobukti', "controller/nobukti.php");
$router->post('inputdebet', 'controller/inputdebet.php');
$router->post('inputkredit', 'controller/inputkredit.php');
$router->post('inputjurnalumum', 'controller/input_jurnalumum.php');
$router->post('accposting', "controller/accposting.php");
$router->post('editjurnal', 'controller/editjurnal.php');
$router->post('deletejurnal', 'controller/deletejurnal.php');

//GET
$router->get('', "controller/index.php");
$router->get('out', "controller/logout.php");
$router->get('login', "controller/login.php");
$router->get('posting', "controller/posting.php");
$router->get('about', "controller/about.php");
$router->get("edit", "controller/edit.php");
$router->get("report", "controller/report.php");
