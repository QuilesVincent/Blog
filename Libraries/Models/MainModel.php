<?php

namespace General\Models;
use General\DBManager;
use PDO;

/**
 * Class MainModel
 * @package App\Models
 * contains general function for fews manager
 */
abstract class MainModel
{
    /**
     * @var
     */
    protected $pdo;
    /**
     * @var
     */
    protected $table;
    /**
     * @var
     */
    protected $obName;

    /**
     * MainModel constructor.
     */
    public function __construct()
    {
        $this->setPdo();
    }


    /**
     * @return array
     */
    public function findAll(): array
    {
        $query = $this->pdo->query("SELECT * FROM {$this->table}");
        $item = $query->fetchAll();
        return $item;
    }

    /**
     * @return array
     */
    public function findAllObj(): array
    {
        $query = $this->pdo->query("SELECT * FROM {$this->table}");
        while($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
            $item[] = new $this->obName($donnees);
        }
        return $item;
    }

    /**
     * @param $target_id
     * @param $id
     * @return mixed
     */
    public function findReturnObj($target_id, $id)
    {
        $req = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE $target_id = :id");

    // On exécute la requête en précisant le paramètre :article_id
        $req->execute([':id' => $id]);

    // On fouille le résultat pour en extraire les données réelles en retournant une class obj
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        $article = new $this->obName($donnees);
        return $article;
    }

    /**
     * @param $id
     * @param $idTarget
     * @return mixed
     */
    public function find($id, $idTarget)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE $idTarget = :id");

    // On exécute la requête en précisant le paramètre :article_id
        $query->execute([':id' => $id]);

    // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();

        return $item;
    }

    /**
     * @param int $id
     */
    public function delete(string $targetId, int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE {$targetId} = :id");
        $query->execute([':id' => $id]);
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    /**
     * set Connexion Database
     */
    public function setPdo(): void
    {
        $this->pdo = DBManager::dbConnect();
    }
}
