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
    <div class="header-rigth-login" style="display: none">
        <h6 class="text-purple">Авторизация</h6>
        <form method="post" action="<?=$url?>/login">
            <div class="user-icon">
                <input type="phone" name="loginLogi" required>
            </div>
            <div class="lock-icon">
                <input type="password" name="loginPass" required>
            </div>
            <div>
                <input type="submit" class="btn-sub" name="loginSub" value="Войти">
            </div>
        </form>
        <h6><a href="<?=$url?>/reg">Регистрация</a></h6>
    </div>
</div>
