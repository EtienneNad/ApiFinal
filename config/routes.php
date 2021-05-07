<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {


    // Pays
    $app->get('/Pays', \App\Action\Pays\AffichagePaysAction::class);
    $app->post('/AddPays', \App\Action\Pays\PaysCreateAction::class);
    $app->put('/ModifierPays',\App\Action\Pays\ModifierPaysAction::class);
    $app->delete('/DeletePays/{id}', \App\Action\Pays\PaysDeleteAction::class);

    // Villes
    $app->get('/Villes', \App\Action\Villes\AffichageVillesAction::class);
    $app->post('/AddVilles', \App\Action\Villes\VillesCreateAction::class);
    $app->put('/ModifierVilles',\App\Action\Villes\ModifierVillesAction::class);
    $app->delete('/DeleteVilles/{id}', \App\Action\Villes\VillesDeleteAction::class);

    // Pays_Villes
    $app->get('/PaysVilles', \App\Action\PaysVilles\AffichagePaysVillesAction::class);
    $app->post('/AddPaysVilles', \App\Action\PaysVilles\PaysVillesCreateAction::class);

    //Docs
    $app->get('/docs/v1', \App\Action\Docs\SwaggerUiAction::class);

};

