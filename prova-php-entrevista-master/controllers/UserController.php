<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function list() {
        $users = $this->userModel->getAll();
        include __DIR__ . '/../views/users/list.php';
    }

    public function form($id = null) {
        $user = $id ? $this->userModel->getById($id) : null;
        
        require_once __DIR__ . '/../models/Color.php';
        $colorModel = new Color();
        $colors = $colorModel->getAll();
        
        $userColors = $id ? array_column($this->userModel->getUserColors($id), 'id') : [];

        include __DIR__ . '/../views/users/form.php';
    }

    public function save($data) {
        $id = $data['id'] ?? null;

        if($id) {
            $this->userModel->update($id, $data['name'], $data['email']);
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
