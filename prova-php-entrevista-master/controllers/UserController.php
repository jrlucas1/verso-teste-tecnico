<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Color.php';

class UserController {
    private $userModel;
    private $colorModel;

    public function __construct() {
        $this->userModel  = new User();
        $this->colorModel = new Color();
    }

    public function list() {
        $users = $this->userModel->getAll();
        include __DIR__ . '/../views/users/list.php';
    }

    public function form($id = null) {
        $user = $id ? $this->userModel->getById($id) : null;
        $userColors = $id ? array_map(fn($c) => $c['id'], $this->userModel->getUserColors($id)) : [];
        $colors = $this->colorModel->getAll();

        include __DIR__ . '/../views/users/form.php';
    }

    public function save($data) {
        $id = $data['id'] ?? null;

        if($id) {
            $this->userModel->update($id, $data['name'], $data['email'], $data['colors']);
        } else {
            $this->userModel->create($data['name'], $data['email']);
        }

        header("Location: index.php?controller=user&action=list");
        exit;
    }

    public function delete($id) {
        $this->userModel->delete($id);
        header("Location: index.php?controller=user&action=list");
        exit;
    }
}
