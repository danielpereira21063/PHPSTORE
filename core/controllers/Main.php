<?php
namespace core\controllers;

use core\classes\Store;

class Main {
    public function index() {
        $data = [
            'titulo' => APP_NAME .' ' .APP_VERSION
        ];
        Store::layout([
            'layouts/html_header',
            'layouts/header',
            'inicio',
            'layouts/footer',
            'layouts/html_footer',
        ], $data);
    }

    public function loja() {
        echo 'Loja';
    }
}