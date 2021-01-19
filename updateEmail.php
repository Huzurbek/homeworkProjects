<?php
    session_start();
    require "Database.php";
    $bd=new Database;

    $data=[
        'id'=>$_GET['id'],
        'email'=>$_POST['email'],
        'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT)
        ];

    $user=$bd->get_user_by_email($_POST['email']);
    if(!empty($user)){
        $bd->flash_message('danger',' Этот эл. адрес уже занят другим пользователем.');
        $bd->redirect_to("security.php");
    }
    $bd->update($data);
    $bd->flash_message('success','электронная почта и пароль успешно обновлен.');
    $bd->redirect_to('users.php');

