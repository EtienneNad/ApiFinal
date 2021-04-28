<?php

namespace App\Domain\User\Repository\Villes;

use PDO;

/**
 * Repository.
 */
class VillesDeleteRepository
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
    public function DeleteVilles($id)
    {
        $sqlPays_Ville = "delete from pays_ville where Pays_id = $id ;";
        if ($this->connection->query($sqlPays_Ville)== true) {
            $sqlVille = "delete from ville where id = $id ;";
            if ($this->connection->query($sqlVille) == false) {

                $reponse = "la Ville n'a pas été supprimer";
            } else {
                $reponse = "la Ville a été supprimer avec succès";
            }
            return $reponse;
        }
    }
}

