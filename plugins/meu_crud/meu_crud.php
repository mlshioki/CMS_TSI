<?php
/*
* Plugin Name: Exemplo de CRUD na tela de configuração
* Plugin URI: https://sp.senac.br
* Description: Este é um plugin exemplo de CRUD na tela de configuração
* Version: 0.0.1
* Author: Sayuri Hioki
* Author URI: https://www.linkedin.com/in/maria-luiza-sayuri-hioki-324929176/
* License: CC BY
*/

if (!defined('WPINC')) exit; //protege o codigo de ser chamado diretamente

register_activation_hook(__FILE__, 'criar_tabela');

function criar_tabela(){
    global $wpdb;
    $wpdb->query("CREATE TABLE {$wpdb->prefix}agenda  
                            (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            nome VARCHAR(255) NOT NULL, 
                            whatsapp BIGINT UNSIGNED NOT NULL)");
}