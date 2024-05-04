<?php

class Controller_Home extends Controller
{
    function __construct() {
        $this->model = new Model_Basket();
        $this->view = new View();
    }

    function action_index() {
        $data = $this->model->getBasket();
        $this->view->generate("app/pages/Home/index.php", "app/layouts/home.php", $data);
    }

    function action_details($id) {
        echo "One item: $id";
    }
    
}
?>
