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
     * @param array $livre The user
     *
     * @return int The new ID
     */
    public function affichageVilles()
    {

        $sql = "SELECT * from ville ;";



        return $this->connection->query($sql)->fetchAll();
    }
}

