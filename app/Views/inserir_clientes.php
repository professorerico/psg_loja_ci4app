<?php echo view('Commons/header'); ?>
<title><?php echo $titulo?></title>
</head>
<body class="mt-3">
    <div class="container">
        <div class="alert alert-info">
            <div>
                <h3><i class="fab fa-phoenix-squadron"></i> Página em Desenvolvimento</h3>
            </div>
            <div class="justify-content-center">
                <div class="d-flex flex-row justify-content-center">
                    <img src="../../writable/imagens/trabalhando.jpg" alt="trabalhando..." width="50%">
                </div>
                <div class="d-flex flex-row justify-content-center">
                    <sub><a href="https://br.freepik.com/vetores/teia">Teia vetor criado por stories - br.freepik.com</a></sub>
                </div>
                <div class="col-3">
                    <a href="<?php echo base_url('index.php/gerenciamento') ?>">
                        <button class="btn btn-info btn-block">
                            <i class="fas fa-backward"></i> Voltar
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>