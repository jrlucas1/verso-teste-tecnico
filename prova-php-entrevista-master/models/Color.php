<?php
require_once __DIR__ . '/../config/connection.php';

class Color {
    private $pdo;

    public function __construct() {
        $this->pdo = (new Connection())->getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM colors");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM colors WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name) {
        $stmt = $this->pdo->prepare("INSERT INTO colors (name) VALUES (?)");
        $stmt->execute([$name]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $name) {
        $stmt = $this->pdo->prepare("UPDATE colors SET name = ? WHERE id = ?");
        $stmt->execute([$name, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM colors WHERE id = ?");
        $stmt->execute([$id]);
    }
}
