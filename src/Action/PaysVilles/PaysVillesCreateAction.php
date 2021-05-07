<?php



namespace App\Action\PaysVilles;

use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use App\Domain\User\Repository\PaysVilles\PaysVillesCreateRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PaysVillesCreateAction
{
    private $PaysVillesCreate;

    public function __construct(PaysVillesCreateRepository $PaysVillesCreate)
    {
        $this->PaysVillesCreate = $PaysVillesCreate;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $id = $this->PaysVillesCreate->insertPaysVilles($data);

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