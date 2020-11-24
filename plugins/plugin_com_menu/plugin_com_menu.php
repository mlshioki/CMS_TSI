<?php
/*
 * Plugin Name: Plugin Com Menu
 * Plugin URI: https://sp.senac.br
 * Description: Este é um plugin com mostra como trabalha com o menu do admin do Wordpress.
 * Version: 0.0.1
 * Author: Sayuri Hioki
 * Author URI: https://www.linkedin.com/in/maria-luiza-sayuri-hioki-324929176/
 * License: CC BY
*/

add_action('admin_init', 'set-configs');

function set_configs(){
    register_setting('config-exemplo', 'api-token');
    register_setting('configs-exemplo', 'aapi-url');
}

add_action('admin_menu', 'menu_do_meu_plugin');

function menu_do_meu_plugin(){
    
    // add_menu_page( 'config do meu plugin',
    //                 'Plugin', 
    //                 'administrator', 
    //                 'meu-plugin-config', 
    //                 'abre configuracoes', 
    //                 'dashicons-admin-generic');
    
    //acessando um submenu do settings(configuracoes).
    add_submenu_page(   'options-general.php',
                        'config do meu plugin', 
                        'Plugin', 
                        'administrator', 
                        'meu-plugin-config', 
                        'abre_configuracoes' );
}

function abre_configuracoes(){
    
    require 'pluginComMenu_tpl.php';
}