<?php echo view('Commons/header') ?>
<title> <?php echo $titulo ?> </title>
</head>
<body class="mt-3">
    <div class="container">
        <div class="alert alert-primary d-flex justify-content-between">
            <h2>Cadastro de Novo Usuário</h2>
            <div>
                <h3> <i class="fas fa-house-user"></i> <?php echo strtoupper(session('usuarioLogado')); ?> </h3>
            </div>
        </div>
        <div class='alert'>
            <h2><?php echo $mensagem ?></h2>
        </div>
        <form name="formulario" class="alert mb-3" method="POST">
            <div class="d-flex flex-row justify-content-around">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-around">
                        <div class="form-group">
                            <label for="usuario">Nome de Usuário: </label>
                            <input type="text " name="usuario" <?php echo ($acao !== 'Inserir' ? 'value='.$usuario->usuario : 'required placeholder="Nome do usuário"') ?>>
                        </div>
                        <div class="form-group">
                            <label for="email">e-mail: </label>
                            <input type="email" name="email" size="40em" <?php echo ($acao !== 'Inserir' ? 'value='.$usuario->email : 'required') ?>>
                        </div>
                    </div>
                    <div class="flex-row justify-content-around">
                        <div class="d-flex flex-row justify-content-around">
                            <div class="form-group flex-column">
                                <label for="senha">Senha: </label>
                                <input type="password" name="senha" <?php echo ($acao === 'Inserir' ? 'required' : '') ?>>
                            </div>
                            <div class="form-group flex-column">
                                <label for="confirma">Confirme a senha: </label>
                                <input type="password" name="confirma" <?php echo ($acao === 'Inserir' ? 'required' : '') ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary ">
                            <i class="fas fa-user-plus "></i> <?php echo ($acao === 'Inserir' ? 'Adicionar' : 'Alterar')?> Usuário
                        </button>
                    </div>
                    <div class='mb-3'>
                        <a href="<?php echo base_url('index.php/gerenciamento')?>">
                            <button class="btn btn-dark btn-block" type="button">
                                <i class="fas fa-user-times"></i> Desfazer
                            </button>
                        </a>
                    </div>
                    <?php if ($acao === 'Inserir') : ?>
                    <div class="mb-3">
                        <a href="<?php echo base_url('index.php/usuario')?>">
                            <button class="btn btn-secondary btn-block" type="button">
                                <i class="fas fa-user-edit"></i> Listar Usuários
                            </button>
                        </a>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </form>
    </div>
</body>

</html>