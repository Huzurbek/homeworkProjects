<?php
    session_start();
    require "Database.php";
    $bd=new Database;
    $status=$bd->setStatus($_POST['status']);
    $filename=$bd->uploadImage($_FILES['image']);
        $data=[
        "username"=>$_POST['username'],
        "job_place"=>$_POST['job_place'],
        "phone_number"=>$_POST['phone_number'],
        "address"=>$_POST['address'],
        "email"=>$_POST['email'],
        "password"=>password_hash($_POST['password'],PASSWORD_DEFAULT),
        "image"=>$filename,
        "status"=>$status,
        "vk_login"=>$_POST['vk_login'],
        "telegram"=>$_POST['telegram'],
        "instagram"=>$_POST['instagram'],
        "is_admin"=>false
         ];

    $user=$bd->get_user_by_email($_POST['email']);

    if(!empty($user)){
        $bd->flash_message('danger',' Этот эл. адрес уже занят другим пользователем.');
        $bd->redirect_to('create_user.php');
    }
    $bd->store('level_2',$data);
    $bd->flash_message('success','Новый профиль успешно добавлен.');
    $bd->redirect_to('users.php');