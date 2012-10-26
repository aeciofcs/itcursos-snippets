<?php
    # Formato da URL:   http://dominio/aplicacao/index.php?resource/action
    #                   http://dominio/aplicacao/?resource/action

    # Obtenção dos dados da URL
    $request    = $_SERVER['REQUEST_URI'];
    $request    = explode("?", $request);
    $dir        = $request[0]; // Diretório do projeto
    $uri        = @$request[1]; // Rota desejada (as vezes a rota pode ser vazia)

    # Separação do recurso e função
    $route      = explode("/", $uri);
    $resource   = @$route[0];
    $action     = @$route[1];
    $parameter  = @$route[2];

    # Definição do diretório de templates
    $root               = $_SERVER['DOCUMENT_ROOT'];
    $templates_dirname  = $dir . 'templates';
    $templates_path     = $root . $templates_dirname;

    # Diretório final
    $final_path = "$templates_path/$resource/$action.php";
    $error_404  = "$templates_path/geral/404.php";
    $main_page  = "$templates_path/geral/inicio.php";

    # Chamada da página
    if(file_exists($final_path))
        include $final_path;
    elseif($uri != "")
        include $error_404;
    else
        include $main_page;