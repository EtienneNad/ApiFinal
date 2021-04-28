<?php

namespace App\Domain\User\Repository\Pays;

use PDO;

/**
 * Repository.
 */
class PaysDeleteRepository
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
    public function DeletePays($id)
    {
        $sqlPaysVilles = "delete from pays_ville where ville_id = $id ;";
        if ($this->connection->query($sqlPaysVilles)== true) {
            $sqlPays = "delete from pays where id = $id ;";
            if ($this->connection->query($sqlPays) == false) {

                $reponse = "le pays n'a pas été supprimer";
            } else {
                $reponse = "le pays a été supprimer avec succès";
            }
            return $reponse;
        }
    }
}

