<?php echo view('Commons/header') ?>

    <title><?php echo $titulo ?></title>
    <script type="text/javascript">
    function excluir(id) {
        if (confirm("Deseja realmente excluir o cadastro?")) {
            window.location.href = ("deleta_produto.php?id=" + id);
        }
    }
    </script>
</head>

<body class="mt-3">
    <div class="container">
        <div class="alert alert-primary d-flex justify-content-between" role="alert">
            <h2><?php echo $titulo ?></h2>
            <div>
                <h3> <i class="fas fa-house-user"></i> <?php echo strtoupper(session('usuarioLogado')); ?> </h3>
            </div>
        </div>
        <div class="alert">
            <h2><?php echo $mensagem ?></h2>
        </div>
        <form class="alert alert-success" method="post" enctype="multipart/form-data">
            <div class="d-flex flex-row mb-1 justify-content-between">
                <div class="d-flex flex-column">
                    <div class="form-group ">
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" required value="<?php echo (isset($produto) ? $produto['nome'] : '')?>">
                    </div>
                    <div class="form-group">
                        <label for="preco">Preço: R$ </label>
                        <input type="number" min="0.00" step="0.01" name="preco" required value="<?php echo (isset($produto) ? $produto['preco'] : '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="data">Validade: </label>
                        <input type="date" name="data" required value="<?php echo (isset($produto) ? $produto['validade'] : '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="imagem_produto">Imagem: </label>
                        <input type="file" name="imagem_produto" accept="image/*" <?php echo ($acao !== 'Inserir') ? '' : 'required' ?>  >
                    </div>
                </div>
                <?php if($acao !== "Inserir") : ?>
                    <div class="d-flex flex-column">
                        <div class="form-group">
                            <img src="<?php echo '../../../../writable/imagens/'.$produto['imagem']?>" width="100em">
                        </div>
                    </div>
                <?php endif ?>
                <div class="d-flex flex-column">
                    <div class="form-group">
                        <label for="descricao">Descrição: </label>
                        <textarea name="descricao" cols="30" rows="10"><?php echo (isset($produto) ? $produto['descricao'] : '') ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button class="btn btn-primary btn-block" type="submit">
                        <?php if($acao === "Inserir"):?>
                            <i class="fas fa-save"></i> <?php echo $acao?>
                        <?php else: ?>
                            <i class="fas fa-edit"></i> <?php echo $acao?>
                        <?php endif ?>
                    </button>
                </div>
                <div class="col-3">
                    <a href="<?php echo base_url($acao === 'Inserir' ? 'index.php/gerenciamento' : 'index.php/produtos/listar') ?>">
                        <button class="btn btn-danger btn-block" type="button">
                            <i class="fas fa-backward"></i> Voltar
                        </button>
                    </a>
                </div>
                <?php if($acao === "Inserir" ) :?>
                    <div class="col-3">
                        <a href="<?php echo base_url('index.php/produtos/listar')?>">
                            <button class="btn btn-block btn-secondary" type="button">
                                <i class="far fa-edit"></i> Editar Produtos
                            </button>
                        </a>
                    </div>
                <?php endif ?>
            </div>
        </form>
</body>

</html>