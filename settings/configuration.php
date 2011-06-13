<?php
/**
 * Constantes de Configuração do Sistema
 */

// Localização do Projeto 
define( "PROJECT_NAME", "myBoardAdmin" );
define( "PROJECT_PATH", $_SERVER["DOCUMENT_ROOT"]."/myBoardAdmin" );
define( "PROJECT_ADDRESS", "http://localhost:8080/myBoardAdmin" );
define( "PROJECT_LANGUAGE", "pt-br" );
 
// Dados de Conexão com Banco de Dados 
define( "DATABASE_HOST", "localhost" );
define( "DATABASE_PORT", "3306" );
define( "DATABASE_NAME", "projeto" );
define( "DATABASE_USER", "root" );
define( "DATABASE_PASSWORD", "magda254" );

// Tipos de Resultados do Banco de Dados
define( "DB_INSERT", "MYSQL_INSERT" );
define( "DB_UPDATE", "MYSQL_UPDATE" );
define( "DB_SELECT", MYSQL_ASSOC );

// Niveis de Erros do Sistema
define( "MB_ERROR", "1" );
define( "MB_WARNING", "2" );
define( "MB_NOTICE", "3" );

// Niveis de Exibição de Mensagens do Sistema
define( "MB_SHOW", "1");
define( "MB_HIDDEN", "2");

// Tipos de Formulario
define( "FORM_INSERT", "1");
define( "FORM_UPDATE", "2");
define( "FORM_LOGIN", "3");

// Tamanho de Campos do Formulario
define( "FIELD_SMALL", "20%");
define( "FIELD_MEDIUM", "45%");
define( "FIELD_LARGE", "95%");
?>
