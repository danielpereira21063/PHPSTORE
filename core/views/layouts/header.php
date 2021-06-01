<?php use core\classes\Store; ?>
<div class="container-fluid navegacao">
    <div class="row">
        <div class="col-6 text-start p-3">
            <a href="?a=inicio">
                <h3><?= APP_NAME ?></h3>
            </a>
        </div>
        <div class="col-6 text-end p-3">
            <a class="nav-item" href="?a=inicio">Inicio</a>
            <a class="nav-item" href="?a=loja">Loja</a>

            <!-- verifica se existe cliente na sessao -->
            <?php if(Store::clienteLogado()): ?>
                <a class="nav-item" href="#">Minha conta</a>
                <a class="nav-item" href="#">Sair</a>
            <?php else: ?>
                <a class="nav-item" href="#">Login</a>
                <a class="nav-item" href="?a=novo_cliente">Criar conta</a>
            <?php endif; ?>

            <a href="?a=carrinho"><i class="fas fa-shopping-cart"></i></a>
            <!--<span class="badge bg-warning">10</span>-->
        </div>
    </div>
</div>
