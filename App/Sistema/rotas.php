<?php
use Rocharor\Site\Controllers\Home;
use Rocharor\Site\Controllers\Galeria;
use Rocharor\Site\Controllers\Representante;
use Rocharor\Admin\Controllers\LoginAdm;
use Rocharor\Admin\Controllers\HomeAdm;
use Rocharor\Admin\Controllers\GaleriaAdm;
use Rocharor\Admin\Controllers\RepresentanteAdm;
use Rocharor\Sistema\Erro;
use function Silex\value;

$app = new Silex\Application();
$app['debug'] = true;

// ======================
// HOME
// ======================
$app->get('/', function () {
    $objHome = new Home();
    $objHome->indexAction();
    return false;
});

$app->get('/galeria', function () {
    $objGaleria = new Galeria();
    $objGaleria->indexAction();
    return false;
});

$app->get('/representante', function () {
    $objRepresentante = new Representante();
    $objRepresentante->indexAction();
    return false;
});

$app->post('/newsletter', function () {
    $objRepresentante = new Home();
    $objRepresentante->salvaEmailAction();
    return false;
});


// ======================
// ADMIN
// ======================

//LOGIN
$app->get('/admin', function () {
    $objLoginAdm = new LoginAdm();
    $objLoginAdm->indexAction();
    return false;
});

$app->post('/admin', function () {
    $objLoginAdm = new LoginAdm();
    $objLoginAdm->indexAction();
    return false;
});

//HOME
$app->get('/admin/home/{parametro}', function ($parametro) {
    $objHomeAdm = new HomeAdm();
    $objHomeAdm->indexAction($parametro);
    return false;
})->value('parametro',false);

$app->post('/admin/home/update', function () {
    $objHomeAdm = new HomeAdm();
    $objHomeAdm->editarHome();
    return false;
});

$app->post('/admin/deslogar', function () {
    $objLoginAdm = new LoginAdm();
    $objLoginAdm->deslogarAction();
    return false;
});

//GALERIA
$app->get('/admin/galeria/{pg}/{parametro}', function($pg,$parametro) {
    $objHomeAdm = new GaleriaAdm();
    $objHomeAdm->indexAction($pg,$parametro);
    return false;
})->value('parametro',false)->value('pg',1);

$app->post('/admin/galeria/create', function () {
    $objHomeAdm = new GaleriaAdm();
    $objHomeAdm->salvarGaleria();
    return false;
});

$app->post('/admin/galeria/update', function () {
    $objHomeAdm = new GaleriaAdm();
    $objHomeAdm->editarGaleria();
    return false;
});

$app->post('/admin/galeria/delete', function () {
    $objHomeAdm = new GaleriaAdm();
    $objHomeAdm->deletarGaleria();
    return false;
});

$app->post('/admin/galeria/dados', function () {
    $objHomeAdm = new GaleriaAdm();
    $objHomeAdm->buscaDadosGaleria();
    return false;
});

//REPRESENTANTES
$app->get('/admin/representante/{pg}/{parametro}', function($pg,$parametro) {
    $objHomeAdm = new RepresentanteAdm();
    $objHomeAdm->indexAction($pg,$parametro);
    return false;
})->value('parametro',false)->value('pg',1);

$app->post('/admin/representante/create', function () {
    $objHomeAdm = new RepresentanteAdm();
    $objHomeAdm->salvarRepresentante();
    return false;
});

$app->post('/admin/representante/update', function () {
    $objHomeAdm = new RepresentanteAdm();
    $objHomeAdm->editarRepresentante();
    return false;
});

$app->post('/admin/representante/delete', function () {
    $objHomeAdm = new RepresentanteAdm();
    $objHomeAdm->deletarRepresentante();
    return false;
});

$app->get('/admin/newsletter/relatorio', function () {
	$objHomeAdm = new HomeAdm();
	$objHomeAdm->geraRelatorio();
	return false;
});


// ======================
// ERRO
// ======================
$app->error(function ($x) {
    $objErro = new Erro();
    $objErro->erroAction();
    return false;
});

$app->run();
