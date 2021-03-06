<?php
/**
 * Constantes do Idioma - Portugu�s Brasil
 */
 
// Mensagens Gen�ricas de Layout
define( "LOC_EMSG_LAYOUT_EMPTY", "Conte�do Vazio" );
define( "LOC_EMSG_LAYOUT_LIST", "Estrutura de Vetor Inv�lida" );

// Termos Gen�ricos
define( "LOC_GENERIC_LIST_EMPTY", "N�o Existem Registros no Sistema" );
define( "LOC_GENERIC_BTN_CONFIRM", "Confirmar" );
define( "LOC_GENERIC_BTN_CANCEL", "Cancelar" );

// Mensagens do Banco de Dados - MySQL
define( "LOC_EMSG_DB_MYSQL_CONNECT", "Erro ao conectar ao Servidor MySQL." );
define( "LOC_EMSG_DB_MYSQL_SELECT", "Erro ao selecionar Base de Dados." );
define( "LOC_EMSG_DB_MYSQL_CLOSE", "Erro ao finalizar conex�o com o Servidor MySQL." );
define( "LOC_EMSG_DB_MYSQL_QUERY_SYNTAX", "Erro ao executar comando no Banco de Dados. Verifique a sintaxe." );
define( "LOC_EMSG_DB_MYSQL_QUERY_CONNECT", "Impossivel executar comando no Banco de Dados. Conex�o inexistente." );
define( "LOC_EMSG_DB_MYSQL_QUERY_EMPTY", "Comando de execu��o do Banco de Dados inv�lido. Imposs�vel executar comando vazio." );
define( "LOC_EMSG_DB_MYSQL_INSERT_EMPTY", "N�o existem resultados de inclus�o relacionados." );
define( "LOC_EMSG_DB_MYSQL_RS_EMPTY", "N�o existem resultados relacionados." );

// Dashboard
define( "LOC_DASHBOARD_TITLE", "Menu Principal" );

// Controle de Login
define( "LOC_LOGIN_TITLE", "Login do Sistema myBoard" );
define( "LOC_LOGIN_LBL_LOGIN", "Login" );
define( "LOC_LOGIN_LBL_PWD", "Senha" );
define( "LOC_LOGIN_LBL_HELLO", "Ol�" );
define( "LOC_LOGIN_LBL_LOGOUT", "Sair do Sistema" );

// Cadastro de Usu�rios
define( "LOC_USUARIO_WINDOW_TITLE", "Janela de Cadastro" );
define( "LOC_USUARIO_FORM_INSERT_TITLE", "Criar Novo Usu�rio" );
define( "LOC_USUARIO_FORM_UPDATE_TITLE", "Alterar Usu�rio" );
define( "LOC_USUARIO_LBL_USER_TYPE", "Tipo de Usu�rio" );
define( "LOC_USUARIO_LBL_NAME", "Nome" );
define( "LOC_USUARIO_LBL_LOGIN", "Login" );
define( "LOC_USUARIO_LBL_PWD_NEW", "Nova Senha" );
define( "LOC_USUARIO_LBL_PWD_CONF", "Confirmar Senha" );
define( "LOC_USUARIO_LBL_BIRTH", "Data de Nascimento" );
define( "LOC_USUARIO_LBL_EMAIL", "E-Mail" );
define( "LOC_USUARIO_LIST_TITLE", "Listagem de Usu�rios" );
define( "LOC_USUARIO_COL_NAME", "Nome" );
define( "LOC_USUARIO_COL_LOGIN", "Login" );
define( "LOC_USUARIO_COL_EMAIL", "E-Mail" );
define( "LOC_USUARIO_BTN_INSERT", "Incluir Novo Usu�rio" );

// Mensagens de Acesso a Tabela Usu�rio
define( "LOC_EMSG_ACC_USUARIO_NN_01", "Usu�rio deve ser informado." );
define( "LOC_EMSG_ACC_USUARIO_NN_02", "Tipo de Usu�rio deve ser informado." );
define( "LOC_EMSG_ACC_USUARIO_NN_03", "Nome do Usu�rio deve ser informado." );
define( "LOC_EMSG_ACC_USUARIO_NN_04", "Login do Usu�rio deve ser informado." );
define( "LOC_EMSG_ACC_USUARIO_NN_05", "Senha do Usu�rio deve ser informada." );
define( "LOC_EMSG_ACC_USUARIO_NN_06", "E-Mail do Usu�rio deve ser informado." );
define( "LOC_EMSG_ACC_USUARIO_INS_01", "Imposs�vel Inserir Usu�rio. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_USUARIO_UPD_01", "Imposs�vel Alterar Usu�rio. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_USUARIO_DEL_01", "Imposs�vel Excluir Perfis do Usu�rio. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_USUARIO_DEL_02", "Imposs�vel Excluir Mat�rias do Usu�rio. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_USUARIO_DEL_03", "Imposs�vel Excluir Permiss�es do Usu�rio. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_USUARIO_DEL_04", "Imposs�vel Excluir Usu�rio. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_USUARIO_FND_01", "Imposs�vel Selecionar Usu�rio. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_USUARIO_LST_01", "Imposs�vel Listar Usu�rios. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_USUARIO_CHK_01", "Login e Senha Inv�lido" );

// Cadastro de Permiss�es
define( "LOC_PERMISSAO_LIST_TITLE", "Permiss�es do Usu�rio" );
define( "LOC_PERMISSAO_COL_DESCRICAO", "Descri��o" );
define( "LOC_PERMISSAO_COL_NONE", "Nenhum" );
define( "LOC_PERMISSAO_COL_ACCESS", "Acessar" );
define( "LOC_PERMISSAO_COL_LIST", "Listar" );
define( "LOC_PERMISSAO_COL_VIEW", "Ver" );
define( "LOC_PERMISSAO_COL_UPDATE", "Alterar" );
define( "LOC_PERMISSAO_COL_INSERT", "Incluir" );
define( "LOC_PERMISSAO_COL_DELETE", "Excluir" );

// Mensagens de Acesso a Tabela Usu�rio
define( "LOC_EMSG_ACC_PERMISSAO_NN_01", "Permiss�o deve ser informada." );
define( "LOC_EMSG_ACC_PERMISSAO_NN_02", "Tipo de Permiss�o deve ser informada." );
define( "LOC_EMSG_ACC_PERMISSAO_NN_03", "Nome da Permiss�o deve ser informado." );
define( "LOC_EMSG_ACC_PERMISSAO_NN_04", "Descri��o da Permiss�o deve ser informada." );
define( "LOC_EMSG_ACC_PERMISSAO_INS_01", "Imposs�vel Inserir Permiss�o. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_PERMISSAO_UPD_01", "Imposs�vel Alterar Permiss�o. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_PERMISSAO_DEL_01", "Imposs�vel Excluir Permiss�o. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_PERMISSAO_LST_01", "Imposs�vel Listar Permiss�es. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_PERMISSAO_CLR_01", "Imposs�vel Excluir Limpar Permiss�es do Usu�rio. Consulte o Administrador do Sistema." );
define( "LOC_EMSG_ACC_PERMISSAO_REF_01", "Imposs�vel Atualizar Permiss�es do Usu�rio. Consulte o Administrador do Sistema." );

// Cadastro de Mat�rias
define( "LOC_MATERIA_WINDOW_TITLE", "Cadastro de Mat�rias" );

// Cadastro de Perfis
define( "LOC_PERFIL_WINDOW_TITLE", "Cadastro de Perfis" );

// Cadastro de Ferramentas
define( "LOC_FERRAMENTA_WINDOW_TITLE", "Cadastro de Ferramentas" );
?>
