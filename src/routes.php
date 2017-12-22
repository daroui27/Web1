<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

/*$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});*/


$app->get('/create', function (Request $request, Response $response, array $args) {

	$capsule = new \Illuminate\Database\Capsule\Manager;
	$this->db;

    $capsule::schema()->dropIfExists('plats');

    $capsule::schema()->create('plats', function (\Illuminate\Database\Schema\Blueprint $table) {
        $table->increments('id');
        $table->string('prenom')->default('');
        $table->string('nom')->default('');
        $table->string('email')->default('');
        $table->string('titre')->default('');
        $table->text('ingredient')->default('');
        $table->text('recette')->default('');
    });

    echo "create ok";
});

$app->post('/ajouter', function (Request $request, Response $response, array $args) {
    // Sample log message
    
    $this->db;

    $plats=new Plats;
    $plats->prenom=$request->getParam('prenom');
    $plats->nom=$request->getParam('nom');
    $plats->email=$request->getParam('email');
    $plats->titre=$request->getParam('titre');
    $plats->ingredient=$request->getParam('ingredient');
    $plats->recette=$request->getParam('recette');

    $plats->save();
    // Render index view
    return $this->renderer->render($response, 'recettetab.phtml', ["plats"=>$plats=Plats::all()]);
});

$app->post('/modifier', function (Request $request, Response $response, array $args) {
    // Sample log message
    
    $this->db;
    $plats=new Plats;
    $plats=Plats::find($request->getParam('id'));
    $plats->prenom=$request->getParam('prenom');
    $plats->nom=$request->getParam('nom');
    $plats->email=$request->getParam('email');
    $plats->titre=$request->getParam('titre');
    $plats->ingredient=$request->getParam('ingredient');
    $plats->recette=$request->getParam('recette');

    $plats->save();
    //Render index view
    return $this->renderer->render($response, 'recettetab.phtml', ["plats"=>$plats=Plats::all()]);
});


$app->post('/supprimer', function (Request $request, Response $response, array $args) {
    // Sample log message
    
    $this->db;
    $plats=new Plats;
    $plats=Plats::find($request->getParam('id'));
    $plats->delete();

    
    // Render index view
    return $this->renderer->render($response, 'recettetab.phtml', ["plats"=>$plats=Plats::all()]);
});


$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    
    $this->db;
    $plats=new Plats;
    $plats=Plats::all();
    require '../templates/recettetab.phtml';
   	
    // Render index view
    //return $this->renderer->render($response, '', ["plats" =>$plats]);
});

$app->post('/amodifier', function (Request $request, Response $response, array $args) {
    // Sample log message
    
    $this->db;
    $plats=new Plats;
    $plats=Plats::find($request->getParam('id'));
    require '../templates/modifier.phtml';
   	
    // Render index view
    //return $this->renderer->render($response, '', ["plats" =>$plats]);
});

$app->get('/showall', function (Request $request, Response $response, array $args) {
    // Sample log message
    
    $this->db;
    $plats=new Plats;
    $plats=Plats::all();
    require '../templates/showall.phtml';
});

$app->post('/showone', function (Request $request, Response $response, array $args) {
    // Sample log message
    
    $this->db;
    $plats=new Plats;
    $plats=Plats::find($request->getParam('id'));
    require '../templates/showone.phtml';
    
    // Render index view
    //return $this->renderer->render($response, '', ["plats" =>$plats]);
});