<?php

class Controller_Users extends Controller
{
    function __construct() {
        $this->model = new Model_Users();
        $this->view = new View();
    }

    function action_index() {
        $data = $this->model->getUsers();
        $this->view->generate("app/pages/Users/index.php", "app/layouts/users.php", $data);
    }

    function action_details($id) {
        echo "One item: $id";
    }
    
}
?>
