<?php
namespace core\controllers;

use core\classes\Store;

class Main {
    public function index() {
        Store::layout([
            'layouts/html_header',
            'layouts/header',
            'inicio',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    public function loja() {
        
        Store::layout([
            'layouts/html_header',
            'layouts/header',
            'loja',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    public function carrinho() {
        
        Store::layout([
            'layouts/html_header',
            'layouts/header',
            'carrinho',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    public function novo_cliente() {
        if(Store::clienteLogado()) {
            $this->index();
            return;
        }

        Store::layout([
            'layouts/html_header',
            'layouts/header',
            'carrinho',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }
}