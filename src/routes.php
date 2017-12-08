<?php

use Slim\Http\Request;
use Slim\Http\Response;


$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


$app->get('/create_table', function (Request $request, Response $response, array $args) {


    $this->db;
    
    $capsule = new \Illuminate\Database\Capsule\Manager;

    $capsule::schema()->dropIfExists('films');

    $capsule::schema()->create('films', function (\Illuminate\Database\Schema\Blueprint $table) {
        $table->increments('ID');
        $table->string('Titre')->default('');
        $table->string('Directeur')->default('');
        $table->string('Acteur')->default('');
        $table->text('Synopsis');
        $table->string('Image_lien')->default('');
    });


    

});

$app->get('/Ajouter', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'Ajouter.html', $args);
});


$app->post('/Ajouter_un_film', function (Request $request, Response $response, array $args) {

     $Titre=strip_tags($request->getParam('Titre'));
     $Directeur=strip_tags($request->getParam('Directeur'));
     $Synopsis=strip_tags($request->getParam('Synopsis'));
     $Acteur=strip_tags($request->getParam('Acteur'));
     $Image_lien=strip_tags($request->getParam('Image_lien'));

     $this->db;

     $films = new films;

     $films->Titre=$Titre;
     $films->Directeur=$Directeur;
     $films->Acteur=$Acteur;
     $films->Synopsis=$Synopsis;
     $films->Image_lien=$Image_lien;

     $films->save();
     echo "<script>alert('Ce film a été bien ajouté dans la base de données!');</script>";
     return $this->renderer->render($response, 'Ajouter.html', $args);
    
});

$app->get('/edit_film', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'edit.html', $args);
});

$app->post('/edit', function (Request $request, Response $response, array $args) {
    $ID=strip_tags($request->getParam('ID'));
     $Titre=strip_tags($request->getParam('Titre'));
     $Directeur=strip_tags($request->getParam('Directeur'));
     $Synopsis=strip_tags($request->getParam('Synopsis'));
     $Acteur=strip_tags($request->getParam('Acteur'));
     $Image_lien=strip_tags($request->getParam('Image_lien'));
    $this->db;
    $films = films::find($ID);
    $films->Titre=$Titre;
     $films->Directeur=$Directeur;
     $films->Acteur=$Acteur;
     $films->Synopsis=$Synopsis;
     $films->Image_lien=$Image_lien;
    $films->save();
    echo "<script>alert('Edité avec succès');</script>";
    return $this->renderer->render($response, 'edit.html', $args);
});

$app->get('/delete_film', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'delete.html', $args);
});

$app->post('/delete', function (Request $request, Response $response, array $args) {
    $ID=strip_tags($request->getParam('ID'));
    $this->db;
    $films = films::where('ID','=',$ID)->first();
    $films->delete();
    echo "<script>alert('Supprimé avec succès');</script>";
    return $this->renderer->render($response, 'delete.html', ["$films"=>$films]);
});

$app->get('/show_all', function (Request $request, Response $response, array $args) {
    // Sample log message
   $this->db;
    $films = films::all();
    
    return $this->renderer->render($response, 'showall.phtml', ["films"=>$films]);
});

$app->get('/show_one', function (Request $request, Response $response, array $args) {
    
    $ID=strip_tags($request->getParam('ID'));
    $this->db;
    $film = films::find($ID);
    
    return $this->renderer->render($response, 'showone.phtml', ["film"=>$film]);
});






