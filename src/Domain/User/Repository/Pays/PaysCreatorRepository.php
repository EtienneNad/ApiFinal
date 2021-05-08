<?php

namespace App\Domain\User\Repository\Pays;

use PDO;

/**
 * Repository.
 */
class PaysCreatorRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert user row.
     *
     * @param array $Pays The user
     *
     * @return int The new ID
     */
    public function InsertPays(array $Pays): int
    {
        $row = [
            'nomPays' => $Pays['nomPays'],
            'population' => $Pays['population'],
            'superficie' => $Pays['superficie'],
            'nombre_ville' => $Pays['nombre_ville'],
            'economie' => $Pays['economie'],
            'typeMonaie'=> $Pays['typeMonaie']

        ];

        $sql = "INSERT INTO pays SET 
                nomPays=:nomPays, 
                population=:population, 
                superficie=:superficie, 
                nombre_ville=:nombre_ville, 
                economie=:economie,            
                typeMonaie=:typeMonaie


                ";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }
}

