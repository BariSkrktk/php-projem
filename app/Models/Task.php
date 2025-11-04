<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Task
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM task");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $description)
    {
        $query = $this->db->prepare("INSERT INTO task SET title = :title, description = :description)");
        $query->execute(
            [
                'title' => $title,
                'description' => $description
            ]
        );

        return $query->rowCount() > 0;
    }
}
