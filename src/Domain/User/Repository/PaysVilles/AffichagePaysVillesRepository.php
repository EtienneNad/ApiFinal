<?php


 namespace App\Domain\User\Repository\PaysVilles;


use PDO;

class AffichagePaysVillesRepository
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
    public function AffichagePaysVilles() :array
    {

        $sql = "select   pays.nomPays,ville.nom_ville, ville.capitale from pays_ville
                inner join ville on pays_ville.ville_id = ville.id
                inner join pays on pays_ville.pays_id = pays.id;";



        return $this->connection->query($sql)->fetchAll();
    }
}