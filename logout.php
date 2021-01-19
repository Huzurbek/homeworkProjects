<?php
    session_start();
    require "Database.php";
    $bd=new Database;


    unset($_SESSION["user"]);
    $bd->redirect_to('page_login.php');