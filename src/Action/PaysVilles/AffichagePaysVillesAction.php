<?php


namespace App\Action\PaysVilles;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Domain\User\Repository\PaysVilles\AffichagePaysVillesRepository;

class AffichagePaysVillesAction
{
    private $affichagePaysVille;

    public function __construct(AffichagePaysVillesRepository $affichagePaysVille)
    {
        $this->affichagePaysVille = $affichagePaysVille;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        $titre = $this->affichagePaysVille->AffichagePaysVilles();


        $response->getBody()->write((string)json_encode($titre));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);




    }

}