<?php
session_start();
require "Database.php";
$bd=new Database;
$status=$bd->setStatus($_POST['status']);
$data=[
    'id'=>$_GET['id'],
    'status'=>$status
];
$bd->update($data);
$bd->flash_message('success','Один из статусов пользователя был успешно обновлен.');
$bd->redirect_to("users.php");