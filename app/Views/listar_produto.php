
    <?php echo view('Commons/header') ?>

    <title>Lista de Produtos</title>
</head>
    <body class="mt-3">
        <div class="container">
            <div class="alert alert-success" role="alert">
                <h2>Lista de Produtos</h2>
            </div>
            <div>
                <h2><?php echo $mensagem ?></h2>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <table class="table table-striped table-hover">
                    <thead>
                    <th>Nome</th>
                    <th>Imagem</th>
                    <th>Preço</th>
                    <th>Validade</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                    </thead>
                    <tbody class="table-success">
                    <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo $produto->nome; ?></td>
                        <td>
                            <img src="<?php echo '../../../writable/imagens/'.$produto->imagem; ?>" alt="<?php echo $produto->imagem; ?>"
                                 width=50em>
                        </td>
                        <td class="text-right"><?php echo str_replace('.', ',',$produto->preco); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($produto->validade)); ?></td>
                        <td><?php echo $produto->descricao; ?></td>
                        <td>
                            <a href="<?php echo base_url('index.php/produtos/apagar').'/'.$produto->codigo ?> "><i class="fas fa-eraser"></i></a>
                            <a href="<?php echo base_url('index.php/produtos/atualizar').'/'.$produto->codigo; ?>"><i
                                        class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
                <div class="col-3">
                    <a href="<?php echo base_url("index.php/produtos/inserir") ?>">
                        <button class="btn btn-dark btn-block">
                            <i class="fas fa-backward"></i> Voltar para Cadastro
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>