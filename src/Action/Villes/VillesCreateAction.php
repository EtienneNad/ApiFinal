<?php

namespace App\Action\Villes;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use App\Domain\User\Repository\Villes\VillesCreatorRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VillesCreateAction
{
    private $villeCreator;

    public function __construct(VillesCreatorRepository $villeCreator)
    {
        $this->villeCreator = $villeCreator;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $id = $this->villeCreator->insertVilles($data);

        // Transform the result into the JSON representation
        $result = [
             'id'=>$id
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
