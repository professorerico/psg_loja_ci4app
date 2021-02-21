<?php echo view('Commons/header') ?>
<title><?php echo $titulo ?></title>
</head>

<body class="mt-3">
<div class="container">
    <div class="d-flex flex-row justify-content-between alert alert-info " role="alert">
        <h2>Lista de Produtos</h2>
        <div class="d-flex flex-row justify-content-between">
            <?php  if(session()->loggedIn === true) :?>
            <div>
                <h3> <i class="fas fa-home"></i> <?php echo session()->usuarioLogado ?> </h3>
            </div>
            <?php endif ?>
            <a href="<?php echo (session()->loggedIn !== true ? base_url('index.php/usuario/login') : base_url('index.php/gerenciamento'))?>">
                <button class="btn btn-warning">
                    <i class="fas fa-key"></i> <?php echo (session()->loggedIn !== true ? 'Acesso Restrito' : 'Acesso Gerenciamento')?>
                </button>
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="table-light">
        <th>Imagem</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Validade</th>
        <th>Descrição</th>
        <th>Ações</th>
        </thead>
        <tbody class="table-info">
        <tr>
            <?php foreach ($produtos as $produto) : ?>
            <td>
                <img src="<?php echo '../writable/'.'imagens/'.$produto['imagem']; ?>" alt="<?php echo $produto['imagem']; ?>" width="50em" >
            </td>
            <td><?php echo $produto['nome']; ?></td>
            <td class="text-right"><?php echo $produto['preco']; ?></td>
            <td><?php echo date('d/m/Y' ,strtotime($produto['validade'])); ?></td>
            <td><?php echo $produto['descricao']; ?></td>
            <td>
                <a href="#">
                    <i class="fas fa-cart-arrow-down"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>