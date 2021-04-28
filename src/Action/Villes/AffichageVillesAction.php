<?php


namespace App\Action\Villes;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Domain\User\Repository\Villes\affichageVillesRepository;

final class AffichageVillesAction
{
    private $affichageVille;

    public function __construct(AffichageVillesRepository $affichageVille)
    {
        $this->affichageVille = $affichageVille;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        $titre = $this->affichageVille->AffichageVilles();
        $result = ([
             'titre' => $titre
        ]);

        $response->getBody()->write((string)json_encode($result));
        return $response->withHeader('Content-Type', 'application/json');

        /**
         * Changer le code de statut de la réponse
         *
         * return $response
         *          ->withHeader('Content-Type', 'application/json')
         *          ->withStatus(422);
         *
         */



    }
}