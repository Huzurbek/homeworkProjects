<?php
    session_start();
    require "Database.php";
        $data=[
        "username"=>'Registered by Email',
        "job_place"=>'RegisterByEmail',
        "phone_number"=>'RegisterByEmail',
        "address"=>'RegisterByEmail',
        "email"=>$_POST['email'],
        "password"=>password_hash($_POST['password'],PASSWORD_DEFAULT),
        "image"=>'registerByEmail.png',
        "vk_login"=>'',
        "telegram"=>'',
        "instagram"=>'',
        "is_admin"=>false

        ];
    $bd=new Database;
    $user=$bd->get_user_by_email($_POST['email']);

    if(!empty($user)){
        $bd->flash_message('danger',' Этот эл. адрес уже занят другим пользователем.');
        $bd->redirect_to('page_register.php');
    }
    $bd->store('level_2',$data);
    $bd->flash_message('success','Регистрация успешна');
    $bd->redirect_to('page_login.php');