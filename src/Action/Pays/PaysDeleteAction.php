<?php

namespace App\Action\Pays;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use App\Domain\User\Repository\Pays\PaysDeleteRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class PaysDeleteAction
{
    private $PaysDelete;

    public function __construct(paysDeleteRepository $PaysDelete)
    {
        $this->PaysDelete = $PaysDelete;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = $request->getAttribute('id');
        $int = (int)$data;
        // Invoke the Domain with inputs and retain the result
       $id = $this->PaysDelete->DeletePays($int);

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($id));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
