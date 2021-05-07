<?php

namespace App\Domain\User\Repository\Villes;

use PDO;

/**
 * Repository.
 */
class VillesCreatorRepository
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
     * @param array $villes The user
     *
     * @return int The new ID
     */
    public function insertVilles(array $villes): int
    {
        $row = [
            'nom_ville' => $villes['nom_ville'],
            'population' => $villes['population'],
            'capitale' => $villes['capitale']

        ];

        $sql = "INSERT INTO ville SET 
                nom_ville=:nom_ville, 
                population=:population, 
                capitale=:capitale 
               
                ";

        $this->connection->prepare($sql)->execute($row);
        return (int)$this->connection->lastInsertId();

    }
}

