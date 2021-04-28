<?php

namespace App\Domain\User\Repository\Villes;

use PDO;

/**
 * Repository.
 */
class ModifierVillesRepository
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
    public function ModificationVille(array $villes): array
    {
        $row = [
            'id' => $villes['id'],
            'nom_ville' => $villes['nom_ville'],
            'population' => $villes['population'],
            'capitale' => $villes['capitale'],

        ];

        $sql = "UPDATE livres SET nom_ville=:nom_ville, population=:population, capitale=:capitale  WHERE id=:id;";

        $this->connection->prepare($sql)->execute($row);
        return $row;
    }
}

