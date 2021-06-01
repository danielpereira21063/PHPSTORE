<?php
namespace core\classes;

class Store {
    public static function layout($estruturas, $data = null) {
        if(!is_array($estruturas)) {
            throw new \Exception('Coleção de estruturas inválidas');
        }
        //apresentar as views
        if(!empty($data) && is_array($data)) {
            extract($data);
        }
        foreach($estruturas as $estrutura) {
            include_once("../core/views/$estrutura.php");
        }
    }

    public static function clienteLogado() {
        //verifica se existe um cliente com sessão
        return isset($_SESSION['cliente']);
    }
}
