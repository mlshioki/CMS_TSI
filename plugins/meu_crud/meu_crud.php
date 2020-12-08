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
                            telefone BIGINT UNSIGNED NOT NULL)");
}
register_deactivation_hook(__FILE__, 'apagar_tabela');


function apagar_tabela(){ 
    global $wpdb;
    $wpdb->query("DROP TABLE {$wpdb->prefix}agenda");
}

function crud_do_meu_plugin(){
    add_menu_page( 'config do meu plugin',
                    'Plugin', 
                    'administrator', 
                    'meu-plugin-config', 
                    'abre_configuracoes', 
                    'dashicons-database');
 
}

add_action( 'admin_menu', 'crud_do_meu_plugin');

function abre_configuracoes(){
    global $wpdb;
    
    if (isset($_GET['editar_form']) && !isset($_POST['alterar'])){
        $id =preg_replace('/\D/', '', $_GET['editar_form']); 
    
        $contato =$wpdb->get_results("SELECT nome,  telefone
                                        FROM {$wpdb->prefix}agenda 
                                        WHERE id = $id");

        require 'form_editar_tpl.php';

        exit();
    }

    if (isset($_POST['alterar'])){
        if ($wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}agenda
                                            SET nome = %s, telefone = %d
                                           WHERE id = %d",
                                                $_POST['nome'],
                                                $_POST['telefone'],
                                                $_POST['id']))){
            $msg_alterar = 'Registro alterado com sucesso!';
        }else{
            $erro_alterar = 'Falha ao tentar alterar o registro!';
        }
    }

    if (isset($_GET['apagar'])){
        $id =preg_replace('/\D/', '', $_GET['apagar']); 

        $wpdb->query("DELETE FROM {$wpdb->prefix}agenda WHERE id=$id");
    }

    if (isset($_POST['submit'])){
        if ($_POST['submit'] == 'gravar'){
            $wpdb->query(
                $wpdb ->prepare("  INSERT INTO {$wpdb->prefix}agenda (nome, telefone) 
                                            VALUES (%s, %d)", $_POST['nome'], $_POST['telefone']) );
        }

    }

    $contatos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}agenda");
    
    require 'lista_tpl.php';
}