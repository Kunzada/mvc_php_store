<?php

class Model_Items implements Model {
    public function getData() {
        return false;
    }

    public function getItems() {
        $items = [new stdClass, new stdClass, new stdClass];
        return $items;
    }

    public function getById($id) {
        // Запрос к базе данных
    }
}