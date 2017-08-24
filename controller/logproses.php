<?php
session_start();
/*
* username : sandbox
* password : centos97
*/
$con = Connection::Connect();
$qb = new QueryBuilder();

$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);

$qb->select('*')
->from('pengguna')
->where("username = '$username'")
->whereAnd("password = '$password'");

$result = $con->query(
  $qb->result()
);
if ($result->fetchColumn() == 1) {
    $_SESSION['login'] = $username;
}
header("Location: /");
