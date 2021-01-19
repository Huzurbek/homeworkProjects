<?php
session_start();
require "Database.php";
$bd=new Database;

$email=$_POST['email'];
$password=$_POST['password'];

$bd->login($email,$password);
