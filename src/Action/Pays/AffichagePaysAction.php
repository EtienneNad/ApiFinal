<?php


namespace App\Action\Pays;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Domain\User\Repository\Pays\AffichagePaysRepository;

final class AffichagePaysAction
{
    private $affichagePays;

    public function __construct(AffichagePaysRepository $affichagePays)
    {
        $this->affichagePays = $affichagePays;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        $pays = $this->affichagePays->affichagePays();

        $response->getBody()->write((string)json_encode($pays));
        return $response

            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);


    }
}