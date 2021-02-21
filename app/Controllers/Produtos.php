<?php

    namespace App\Controllers;

    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;
    use Psr\Log\LoggerInterface;

    class Produtos extends BaseController
    {

        public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
        {
            // Do Not Edit This Line
            parent::initController($request, $response, $logger);

            //--------------------------------------------------------------------
            // Preload any models, libraries, etc, here.
            //--------------------------------------------------------------------
            $this->session = \Config\Services::session();
        }


        public function inserir(){

            $dados = [
                'titulo' => 'Inserir Produto',
                'acao' => 'Inserir',
                'mensagem' => ''
            ];

            if($this->request->getMethod() === 'post')
            {
                $imagemFile = $this->request->getFile('imagem_produto');
                $imagemNomeBD = $this->request->getPost("nome").'.'.$imagemFile->guessExtension();
                $imagemFile->move(WRITEPATH.'imagens',$imagemNomeBD);
                if($imagemFile->getError() == 0)
                {
                    $modelProdutos = new \App\Models\ModelProdutos();
                    $arrayProduto = [
                        'nome' => $this->request->getPost('nome'),
                        'descricao' => $this->request->getPost('descricao'),
                        'preco' => $this->request->getPost('preco'),
                        'validade' => $this->request->getPost('data'),
                        'imagem' => $imagemNomeBD
                    ];

                    $modelProdutos->set($arrayProduto);

                    if($modelProdutos->insert())
                    {
                        $dados['mensagem'] = 'Produto Inserido com Sucesso';
                    }else {
                        $dados['mensagem'] = 'Erro ao inserir o Produto';
                    }
                } else {
                    $dados['mensagem'] = 'Erro ao inserir imagem '.$imagemFile->getErrorString().' ('.$imagemFile->getError().')';
                }
            }
            return view('inserir_produto',$dados);
        }

        public function atualizar($id)
        {
            $modelProdutos = new \App\Models\ModelProdutos();

            $dados = [
                'titulo' => 'Atualizar Produto '.$id,
                'acao' => 'Atualizar',
                'mensagem' => '',
                'produto' => $modelProdutos->find($id)
            ];

            if($this->request->getMethod() === 'post')
            {
                $arrayProduto = [
                    'nome' => $this->request->getPost('nome'),
                    'descricao' => $this->request->getPost('descricao'),
                    'preco' => $this->request->getPost('preco'),
                    'validade' => $this->request->getPost('data')
                ];
                $imagemFile = $this->request->getFile('imagem_produto');
                if(isset($imagemFile))
                {
                    $imagemNomeBD = $this->request->getPost("nome") . '.' . $imagemFile->guessExtension();
                    $imagemFile->move(WRITEPATH . 'imagens', $imagemNomeBD,true);
                    if($imagemFile->getError() == 0)
                    {
                        $arrayProduto['imagem'] = $imagemNomeBD;
                    }
                }
                if ($modelProdutos->update($id,$arrayProduto))
                    {
                        $dados= [
                            'mensagem' => "Produto Atualizado com Sucesso",
                            'titulo' => 'Lista de Produtos',
                            'acao' => 'Atualizar',
                            'produto' => $modelProdutos->find($id)
                        ];
                        return view('inserir_produto',$dados);
                    } else
                    {
                        $dados['mensagem'] = "Erro ao Atualizar Produto";
                    }
            }
            return view('inserir_produto', $dados);
        }

        public function listar()
        {
            $dados = [
                'acao' => '',
                'mensagem' => $this->session->getFlashdata('msg')
            ];

            $modelProdutos = new \App\Models\ModelProdutos();
            $produtos = $modelProdutos->find();

            $dados['produtos'] = $produtos;

            return view('listar_produto',$dados);
        }

        public function apagar($id = null)
        {

            if(is_null($id)){
                $this->session->setFlashdata('msg', 'Nada para apagar');
                return redirect()->to(base_url('index.php/produtos/listar'));
            }
            $modelProdutos = new \App\Models\ModelProdutos();

            $dados['mensagem'] = ($modelProdutos->delete($id)) ? 'Produto Apagado' : 'Erro ao apagar produto';

            $dados['produtos'] = $modelProdutos->find();

            return view('listar_produto',$dados);
        }
    }