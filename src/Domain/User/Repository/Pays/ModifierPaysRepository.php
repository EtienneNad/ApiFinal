<?php

namespace App\Domain\User\Repository\Pays;

use PDO;

/**
 * Repository.
 */
class ModifierPaysRepository
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
    public function ModificationPays(array $Pays): array
    {
        $row = [
            'id' => $Pays ['id'],
            'nomPays' => $Pays['nomPays'],
            'population' => $Pays['population'],
            'superficie' => $Pays['superficie'],
            'nombre_ville' => $Pays['nombre_ville'],
            'economie' => $Pays['economie']
        ];

        $sql = "UPDATE pays SET nomPays=:nomPays, population=:population, superficie=:superficie, nombre_ville=:nombre_ville, economie=:economie  WHERE id=:id;";

        $this->connection->prepare($sql)->execute($row);
        return $row;
    }
}

