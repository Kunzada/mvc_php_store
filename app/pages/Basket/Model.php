<?php

class Model_Basket implements Model {
    public function getData() {
        return false;
    }

    public function getBasket() {
        $basket = [new stdClass, new stdClass, new stdClass];
        return $basket;
    }

    public function getById($id) {
        // Запрос к базе данных
    }
}