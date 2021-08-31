<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 11/05/2021
 * Time: 14:21
 */
/**
 * Plugin Name: Math123 User Authorization
 * Description: Плагин для проврки авторизации пользоваделя на базовом сайте. Если пользователь авторизован то подтягиваются его личные данные и отображается меню. Вставлять его в место где будет отображаться его ФИО, в нашем случае это шапка сайта (шаблон header/site-header.php) [math123-auth-user url='http://user.math123.local/'], шорт код принимает параметр url - адрес базового сайта (без параметров, параметры указаны уже в AJAX запросе), где проходит авторизация.
 * Plugin URI: https://
 * Author: Andrey Tynyany
 * Version: 1.0.1
 * Author URI: http://tynyany.ru
 *
 * Text Domain: Math123 User Authorization
 *
 * @package Math123 User Authorization
 */

defined('ABSPATH') or die('No script kiddies please!');

define( 'WPM123UA_VERSION', '1.0.1' );

define( 'WPM123UA_REQUIRED_WP_VERSION', '5.5' );

define( 'WPM123UA_PLUGIN', __FILE__ );

define( 'WPM123UA_PLUGIN_BASENAME', plugin_basename( WPM123UA_PLUGIN ) );

define( 'WPM123UA_PLUGIN_NAME', trim( dirname( WPM123UA_PLUGIN_BASENAME ), '/' ) );

define( 'WPM123UA_PLUGIN_DIR', untrailingslashit( dirname( WPM123UA_PLUGIN ) ) );

define( 'WPM123UA_PLUGIN_URL',
    untrailingslashit( plugins_url( '', WPM123UA_PLUGIN ) )
);

$wp_math123_ua_array = array();

add_shortcode('math123-auth-user','wp_math123_ua_start');

function wp_math123_ua_start($atts){
    global $wp_math123_ua_array;
    $wp_math123_ua_array['url'] = $atts['url'];
    /**
     * Подключили скрипт для обработки
     */
    add_action('wp_footer', 'wp_math123_ua_script');

    if(isset($_COOKIE['id_user']) AND !empty((int)$_COOKIE['id_user']) AND isset($_COOKIE['session_id']) AND !empty($_COOKIE['session_id'])){
        return wp_math123_ua_login_html($atts['url']);
    }else{
        return wp_math123_ua_no_login_html($atts['url']);
    }
}

/**
 * То, что выводем если пользователь не авторизован
 */
function wp_math123_ua_no_login_html($url){
    return '<div class="header-rigth-login">
                    <h6 class="text-purple">Авторизация</h6>
                    <form method="post" action="'.$url.'/login">
                        <div class="user-icon">
                            <input type="phone" name="loginLogi">
                        </div>
                        <div class="lock-icon">
                            <input type="password" name="loginPass">
                        </div>
                        <div>
                            <input type="submit" class="btn-sub" name="loginSub" value="Войти">
                        </div>
                    </form>
                    <h6><a href="'.$url.'/reg">Регистрация</a></h6>
                </div>';
}

/**
 * То что указываем в шапке если залогинен на базовом сайте
 */
function wp_math123_ua_login_html($url){
    include 'include/templates/user_info_for_header.php';
    return true;
}

/**
 * Подключение скриптов и стилей
 */
function wp_math123_ua_script(){
    global $wp_math123_ua_array;
    $js_data['url']     = $wp_math123_ua_array['url'];
    $js_data['id_user'] = (isset($_COOKIE['id_user']))?(int)$_COOKIE['id_user']:false;
    $js_data['session_id'] = (isset($_COOKIE['session_id']))?$_COOKIE['session_id']:false;

    wp_register_style( 'math123_ua_css', plugins_url( 'assets/style.css', __FILE__ ));

    wp_enqueue_style( 'math123_ua_css');

    /**
     * регистрация скриптов
     */
    wp_register_script('math123_ua_script', plugins_url( 'assets/script.js', __FILE__ ));
    /**
     * подключение скриптов
     */
    //wp_enqueue_script('yandexMapScript');
    wp_enqueue_script('math123_ua_script');
    /**
     * Параматры для скрипта
     */
    wp_localize_script( 'math123_ua_script', 'wpMath123UAObj', $js_data );
}