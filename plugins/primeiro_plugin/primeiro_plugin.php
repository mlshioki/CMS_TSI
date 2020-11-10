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

add_action('wp_head', 'colocar_og_tags');

function colocar_og_tags(){
    if(is_single()){
        $dados_post = get_post(get_the_ID());
        $nome_site = get_bloginfo();
        $titulo = $dados_post->post_title;
        $resumo = $dados_post->post_excerpt;
        
        echo "\n\n\n
            <meta property='og:title' content='" . $titulo . "'>\n
            <meta property='og:site_name' content='" . $nome_site . "'>\n
            <meta property='og:url' content='" . get_permalink() . "'>\n
            <meta property='og:description' content='" . $resumo . "'>\n
            \n\n\n";
    }
}