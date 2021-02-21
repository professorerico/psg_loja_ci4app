<?php echo view('Commons/header') ?>
    <title>Gerenciameto Geral</title>
</head>
<body class="mt-3">
    <div class="container">
        <div class="alert alert-primary d-flex justify-content-between">
            <h2>Página de Gerencimento de Infomações</h2>
            <h3><i class="fas fa-house-user"></i><?php echo strtoupper(session('usuarioLogado'))?></h3>
        </div>
        <div class="d-flex flex-column justify-content-between ">
            <div class="d-flex flex-row justify-content-around">
                <div class="col-3">
                    <a href="<?php echo base_url('index.php/produtos/inserir') ?>">
                        <button class="btn btn-warning">
                            <i class="fas fa-tasks"></i> Gerenciamento de Produtos
                        </button>
                    </a>
                </div>
                <div class="col-3">
                    <a href="<?php echo base_url('index.php/usuario/inserir') ?>">
                        <button class="btn btn-warning">
                            <i class="fas fa-user-friends"></i> Gerenciamento de Usuários
                        </button>
                    </a>
                </div>
                <div class="col-3">
                    <a href="<?php echo base_url('index.php/clientes') ?>">
                        <button class="btn btn-warning">
                            <i class="fas fa-user-tag"></i> Gerenciamento de Clientes
                        </button>
                    </a>
                </div>
            </div>
            <div class="mt-3 d-flex flex-row justify-content-around">
                <div class="col-3 btn btn-dark btn-block">
                    Estoque
                </div>
            </div>
            <div class="mt-3 d-flex flex-row justify-content-around">
                <div class="col-3">
                    <a href="<?php echo base_url('index.php/usuario/logout') ?>">
                        <button class="btn btn-secondary btn-block" type="button">
                            <i class="fas fa-sign-out-alt"></i> Encerrar Gerenciamento
                        </button>
                    </a>
                </div>
                <div class="col-3">
                    <a href="<?php echo base_url() ?>">
                        <button class="btn btn-secondary btn-block" type="button">
                            <i class="fas fa-backward"></i> Voltar para Produtos
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
