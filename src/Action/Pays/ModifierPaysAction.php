<?php

namespace App\Action\Pays;
use App\Domain\User\Repository\Pays\ModifierPaysRepository;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ModifierPaysAction
{
    private $ModifierPays;

    public function __construct(ModifierPaysRepository $ModifierPays)
    {
        $this->ModifierPays = $ModifierPays;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $id = $this->ModifierPays->ModificationPays($data);

        // Transform the result into the JSON representation
        $result = [
            'id' => $id ['id'],
            'nomPays' => $id['nomPays'],
            'population' => $id['population'],
            'superficie' => $id['superficie'],
            'nombre_ville' => $id['nombre_ville'],
            'economie' => $id['economie'],
            'typeMonaie'=> $id['typeMonaie']

        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
