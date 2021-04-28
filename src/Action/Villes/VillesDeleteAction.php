<?php

namespace App\Action\Villes;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use App\Domain\User\Repository\Villes\VillesDeleteRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VillesDeleteAction
{
    private $VilleDelete;

    public function __construct(VillesDeleteRepository $VilleDelete)
    {
        $this->VilleDelete = $VilleDelete;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = $request->getAttribute('id');
        $int = (int)$data;
        // Invoke the Domain with inputs and retain the result
       $id = $this->VilleDelete->DeleteVilles($int);

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($id));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
