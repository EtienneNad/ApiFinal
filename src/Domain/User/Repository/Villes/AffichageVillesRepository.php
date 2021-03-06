<?php

namespace App\Domain\User\Repository\Villes;

use PDO;

/**
 * Repository.
 */
class AffichageVillesRepository
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
     * @return array The new ID
     */
    public function AffichageVilles() :array
    {

        $sql = "SELECT * from ville ;";



        return $this->connection->query($sql)->fetchAll();
    }
}

