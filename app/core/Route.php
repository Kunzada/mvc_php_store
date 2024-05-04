<?php

class Route {
    static function init() {
        // Устанавливаем значения по умолчанию для имени контроллера и действия
        $controller_name = "Home";
        $action_name = "index";

        // Разбиваем URI запроса на части с помощью функции explode()
        $routes = explode("/", $_SERVER["REQUEST_URI"]);

        // [0 = null / 1 /  2  /  3 ]
        // [localhost/mvc/items/id1234]

        // Если в URI есть третий элемент, то его значение используется в качестве имени контроллера
        if(!empty($routes[2])) {
            // Приводим значение к нижнему регистру и первую букву к верхнему регистру:
            // strtolower:   ItEmS → items
            // ucfirst:    [i]tems → [I]tems
            $controller_name = ucfirst(strtolower($routes[2]));
        }

        // Если в URI есть четвертый элемент, то его значение используется в качестве имени действия
        if(!empty($routes[3])) {
            if (str_starts_with($routes[3], "id")) {
                $action_name = "details";
                $id = substr($routes[3], 2);
            }
            else {
                $action_name = $routes[3];
            }
        }

        // Формируем пути к файлам контроллера и модели для запрошенного контроллера
        $controller_file = "app/pages/$controller_name/Controller.php";
        $model_file = "app/pages/$controller_name/Model.php";

        // Проверяем существование файлов контроллера и модели
        if (file_exists($controller_file) && file_exists($model_file)) {
            // Если файлы существуют, формируем имена классов контроллера и модели
            $controller_name = "Controller_$controller_name";
            $model_name = "Model_$controller_name";

            // Подключаем файлы контроллера и модели
            include_once $controller_file;
            include_once $model_file;
        } else {
            // Если файлы не найдены, вызываем метод PageNotFound()
            self::PageNotFound();
            return;
        }

        // Формируем имя класса контроллера и имя метода действия
        $controller_class = $controller_name;
        $action_method = "action_$action_name";

        // Проверяем существование класса контроллера
        if (class_exists($controller_class)) {
            // Если класс существует, создаем его экземпляр
            $controller = new $controller_class;
            // Проверяем существование метода действия в контроллере
            if (method_exists($controller, $action_method)) {
                // Если метод существует, вызываем его
                if(isset($id)) {
                    $controller->$action_method($id);
                }
                else {
                    $controller->$action_method();
                }
            }
            else {
                // Если метод не найден, вызываем метод PageNotFound()
                self::PageNotFound();
                return;
            }
        }
        else {
            // Если класс контроллера не найден, вызываем метод PageNotFound()
            self::PageNotFound();
            return;
        }
    }

    // Метод для вывода страницы 404 Not Found
    static function PageNotFound() {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        echo '404 Not Found';
    }
}
