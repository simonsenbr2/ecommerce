<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;

$app = new Slim();  // o slim trabalha montando rotas

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page();   // ao criar ele ja chama a montagem do header

    $page->setTpl("index");  // aqui vem o meio da pagina  e ao Terminar ele chama automaticamente o destruct que monta o rodapé

});

$app->get('/admin', function() {

    $page = new PageAdmin();   // ao criar ele ja chama a montagem do header

    $page->setTpl("index");  // aqui vem o meio da pagina  e ao Terminar ele chama automaticamente o destruct que monta o rodapé

});

$app->run();

 ?>