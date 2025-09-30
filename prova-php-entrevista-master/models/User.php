<?php
require_once __DIR__ . '/../config/connection.php';

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = (new Connection())->getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT u.*, GROUP_CONCAT(c.name, ', ') as colors
                                    FROM users u
                                    LEFT JOIN user_colors uc ON u.id = uc.user_id
                                    LEFT JOIN colors c ON c.id = uc.color_id
                                    GROUP BY u.id
                                    ORDER BY u.id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT u.*, GROUP_CONCAT(c.name, ', ') as colors
                                    FROM users u
                                    LEFT JOIN user_colors uc ON u.id = uc.user_id
                                    LEFT JOIN colors c ON c.id = uc.color_id
                                    WHERE u.id = ?
                                    GROUP BY u.id
                                    ORDER BY u.id ASC");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $colors = []) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        $userId = $this->pdo->lastInsertId();
        return $userId;
    }

    public function update($id, $name, $email, $colors = []) {
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $email, $id]);
        $this->syncColors($id, $colors);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $this->syncColors($id, []);
    }

    public function getUserColors($id) {
        $stmt = $this->pdo->prepare("SELECT c.id, c.name
                                    FROM user_colors uc
                                    INNER JOIN colors c ON c.id = uc.color_id
                                    WHERE uc.user_id = ?");
        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function syncColors($userId, $colors) {
        $stmt = $this->pdo->prepare("DELETE FROM user_colors WHERE user_id = ?");
        $stmt->execute([$userId]);
        if (!empty($colors)) {
            $stmt = $this->pdo->prepare("INSERT INTO user_colors (user_id, color_id) VALUES (?, ?)");
            foreach ($colors as $colorId) {
                $stmt->execute([$userId, $colorId]);
            }
        }
    }
}
