<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 11/05/2021
 * Time: 15:02
 */
?>
<div class="header-rigth-singin">
    <!-- Спинер загрузки -->
    <div class="spinner-border mt-3 spiner_header" role="status" >
        <span class="visually-hidden">Загрузка...</span>
    </div>
     <!-- ФИО родителя -->
    <div class="header-rigth-singin-fio" style="display: none">
        <span id="user_name_header">Куки</span> <span id="user_surname_header">Не правильны</span>, добро пожаловать!
    </div>
    <!-- Иконки -->
    <div class="heder-rigth-singin-info" style="display: none">
        <div class="heder-rigth-singin-info-wrap-element">
            <a href="<?=$url?>/messag" data-bs-toggle="tooltip" data-bs-placement="top" title="Сообщения"><i class="far fa-envelope"></i></a>
            <span class="badge rounded-pill bg-warning text-dark" id="user_message_header" style="display: none"></span>
        </div>
        <div class="heder-rigth-singin-info-wrap-element">
            <a href="<?=$url?>/mygroups" data-bs-toggle="tooltip" data-bs-placement="top" title="Счета"><i class="fas fa-ruble-sign"></i></a>
            <span class="badge rounded-pill bg-warning text-dark" id="user_bills_header" style="display: none"></span>
        </div>
        <div class="heder-rigth-singin-info-wrap-element">
            <a href="<?=$url?>/mydostigenija" data-bs-toggle="tooltip" data-bs-placement="top" title="Достижения"><i class="fas fa-trophy" ></i></a>
            <span class="badge rounded-pill bg-warning text-dark" id="user_progress_header" style="display: none"></span>
        </div>
        <div class="heder-rigth-singin-info-wrap-element">
            <a href="<?=$url?>/logoff" data-bs-toggle="tooltip" data-bs-placement="top" title="Выход"><i class="fas fa-door-open"></i></a>
        </div>
    </div>
    <!-- Воход на сайт -->
    <div class="enter-login" style="display: none">
        <a href="<?=$url?>/reg">регистрация</a> / <a href="<?=$url?>/login" rel="noopener noreferrer">войти</a></div>
    </div>
</div>
