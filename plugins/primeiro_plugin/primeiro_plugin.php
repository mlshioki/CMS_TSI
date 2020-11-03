<?php
/*
* Plugin Name: Primeiro Plugin
* Plugin URI: https://sp.senac.br
* Description: Este é um lindo plugin desenvolvido por mim
* Version: 0.0.1
* Author: Sayuri Hioki
* Author URI: https://www.linkedin.com/in/maria-luiza-sayuri-hioki-324929176/
* License: CC BY
*/

add_filter('login_errors', 'altera_msg_login');

function altera_msg_login(){
    return 'Credenciais inválidas, tente novamente';
}