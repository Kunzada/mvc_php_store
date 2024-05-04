<?php

class Model_Users implements Model {
    public function getData() {
        return false;
    }

    public function getUsers() {
        $users = [new stdClass, new stdClass, new stdClass];
        return $users;
    }

    public function getById($id) {
        // Запрос к базе данных
    }
}