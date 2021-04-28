<?php

namespace App\Domain\User\Repository\Pays;

use PDO;

/**
 * Repository.
 */
class AffichagePaysRepository
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
     * @param array $pays The user
     *
     * @return int The new ID
     */
    public function affichagePays()
    {

        $sql = "SELECT * from pays ;";



        return $this->connection->query($sql)->fetchAll();
    }
}

