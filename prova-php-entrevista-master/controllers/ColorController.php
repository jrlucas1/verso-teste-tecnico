<?php
require_once __DIR__ . '/../models/Color.php';

class ColorController {
    private $colorModel;

    public function __construct() {
        $this->colorModel = new Color();
    }

    public function list() {
        $colors = $this->colorModel->getAll();
        include __DIR__ . '/../views/colors/list.php';
    }

    public function form($id = null) {
        $color = $id ? $this->colorModel->getById($id) : null;
        include __DIR__ . '/../views/colors/form.php';
    }

    public function save($data) {
        $id = $data['id'] ?? null;

        if($id) {
            $this->colorModel->update($id, $data['name']);
        } else {
            $this->colorModel->create($data['name']);
        }

        header("Location: index.php?controller=color&action=list");
        exit;
    }

    public function delete($id) {
        $this->colorModel->delete($id);
        header("Location: index.php?controller=color&action=list");
        exit;
    }
}
