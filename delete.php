<?php
session_start();
require "Database.php";
$bd=new Database;

$id=$_GET['id'];


$bd->delete($id);
$bd->flash_message('success','Oдин из профилей успешно удален.');
$bd->redirect_to("users.php");
