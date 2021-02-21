<?php echo view('Commons/header') ?>
    <title><?php echo $titulo ?></title>

</head>
<body class="mt-3">
    <div class="container">
        <div class="alert alert-primary d-flex flex-row justify-content-between">
            <div>
                <h3>Lista de Usuários</h3>
            </div>
            <div>
                <h4> <?php echo $mensagem ?> </h4>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <table class='table table-striped table-hover'>
                <thead class="table-secondary">
                    <th>Nome do Usuario</th>
                    <th>Ações</th>
                </thead>
                <tbody class="table-warning">
                    <?php foreach ($usuario as $user) : ?>
                    <tr>
                        <td><?php echo $user['usuario'] ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/usuario/excluir').'/'.$user['id'] ?>">
                                <i class="fas fa-user-minus"></i>
                            </a>
                            <a href="<?php echo base_url('index.php/usuario/alterar').'/'.$user['id'] ?>">
                                <i class="fas fa-user-edit"></i>
                            </a>
                            <a href="<?php echo base_url('index.php/usuario/resetar_senha').'/'.$user['id'] ?>">
                                <i class="fas fa-user-shield"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="col-3">
                <a href="<?php echo base_url('index.php/usuario/inserir')?>">
                    <button class="btn btn-block btn-secondary">
                        <i class="fas fa-backward"></i> Voltar
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>