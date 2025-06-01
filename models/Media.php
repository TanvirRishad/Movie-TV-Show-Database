<?php
class Media {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllMedia($genre = '', $search = '') {
        $query = "SELECT * FROM media WHERE 1=1";
        $params = [];

        if ($genre) {
            $query .= " AND genre = ?";
            $params[] = $genre;
        }
        if ($search) {
            $query .= " AND title LIKE ?";
            $params[] = "%$search%";
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>