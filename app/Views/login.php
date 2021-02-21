<?php echo view('Commons/header')?>
    <title>Acesso ao Gerenciamento</title>
</head>
<body class="container">
<div class="alert alert-warning" role="alert">
    <div>
        <h2>Área Restrita</h2>
    </div>
</div>
<div class="alert alert-warning">
    <form class="d-flex flex-column" method="post">
        <div class="d-flex flex-column">
            <div class="flex-row">
                <label for="usuario">Usuário: </label>
                <input type="text" name="usuario" required>
            </div>
            <div>
                <h5 class="alert-danger d-inline"><?php echo session('mensagem') ?></h5>
            </div>
            <div class="flex-row">
                <label for="senha">Senhas: </label>
                <input type="password" name="senha" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <button value="entrar" name="entrar" class="btn btn-primary" type="submit">
                    <i class="far fas fa-user-ninja"></i> Acessar
                </button>
            </div>
            <div class="col-3">
                <a href="<?php echo base_url()?>">
                    <button class="btn btn-dark" type="button">
                        <i class="far fa-arrow-alt-circle-left"></i>Cancelar
                    </button>
                </a>
            </div>
        </div>
    </form>
</div>
</body>