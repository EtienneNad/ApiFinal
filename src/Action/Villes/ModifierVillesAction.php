<?php

namespace App\Action\Villes;
use App\Domain\User\Repository\Villes\ModifierVillesRepository;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ModifierVillesAction
{
    private $ModifierVille;

    public function __construct(ModifierVillesRepository $ModifierVille)
    {
        $this->ModifierVille = $ModifierVille;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $id = $this->ModifierVille->ModificationVille($data);

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
