<?php
    session_start();
    require "Database.php";
    $bd=new Database;

    $filename=$bd->uploadImage($_FILES['image']);
    $data=[
        'id'=>$_GET['id'],
        'image'=>$filename
    ];
    $bd->update($data);
    $bd->flash_message('success','Oдна из аватаров пользователей обновлена успешно.');
    $bd->redirect_to("users.php");
