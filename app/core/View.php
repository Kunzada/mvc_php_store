<?php

class View {
    // public $template; — шаблон по умолчанию

    function generate($content, $template, $data = null) {
        if(is_array($data)) {
            extract($data);
        }
        include_once $template;
    }
}