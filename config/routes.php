<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {


    // Pays
    $app->get('/Pays', \App\Action\Pays\AffichagePaysAction::class);
    $app->post('/AddPays', \App\Action\Pays\PaysCreateAction::class);
    $app->delete('/DeletePays/{id}', \App\Action\Pays\PaysDeleteAction::class);
    $app->put('/modifierPays',\App\Action\Pays\ModifierPaysAction::class);

    // Villes
    $app->get('/Villes', \App\Action\Villes\AffichageVillesAction::class);
    $app->post('/AddVilles', \App\Action\Villes\VillesCreateAction::class);
    $app->delete('/DeleteVilles/{id}', \App\Action\Villes\VillesDeleteAction::class);
    $app->put('/modifierVilles',\App\Action\Villes\ModifierVillesAction::class);

    //Docs
    $app->get('/docs/v1', \App\Action\Docs\SwaggerUiAction::class);

};

