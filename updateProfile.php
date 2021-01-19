<?php
    session_start();
    require "Database.php";
    $bd=new Database;

    $data=[
        'id'=>$_GET['id'],
        'username'=>$_POST['username'],
        'job_place'=>$_POST['job_place'],
        'phone_number'=>$_POST['phone_number'],
        'address'=>$_POST['address']
    ];
    $bd->update($data);
    $bd->flash_message('success','Профиль успешно обновлен.');
    $bd->redirect_to("users.php");
