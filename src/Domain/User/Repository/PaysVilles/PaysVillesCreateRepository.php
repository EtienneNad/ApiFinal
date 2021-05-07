<?php


namespace App\Domain\User\Repository\PaysVilles;

use PDO;

class PaysVillesCreateRepository
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
    public function insertPaysVilles(array $villes): int
    {
        $row = [
            'pays_id' => $villes['pays_id'],
            'ville_id' => $villes['ville_id']

        ];

        $sql = "INSERT INTO pays_ville SET 
                pays_id=:pays_id, 
                ville_id=:ville_id 
               
                ";

        $this->connection->prepare($sql)->execute($row);
        return (int)$this->connection->lastInsertId();

    }}