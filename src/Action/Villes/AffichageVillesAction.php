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


        $response->getBody()->write((string)json_encode($titre));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(202);




    }
}