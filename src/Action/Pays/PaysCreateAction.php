<?php

namespace App\Action\Pays;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use App\Domain\User\Repository\Pays\PaysCreatorRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class PaysCreateAction
{
    private $paysCreator;

    public function __construct(PaysCreatorRepository $paysCreator)
    {
        $this->paysCreator = $paysCreator;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $id = $this->paysCreator->InsertPays($data);

        // Transform the result into the JSON representation
        $result = [
            'id' => $id
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
