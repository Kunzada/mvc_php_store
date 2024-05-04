<?php

class Model_Home implements Model {
    public function getData() {
        return false;
    }

    public function getHome() {
        $home = [new stdClass, new stdClass, new stdClass];
        return $home;
    }

    public function getById($id) {
        // Запрос к базе данных
    }
}