<?php

    namespace App\Controllers;

    use App\Models\ModelProdutos;

    class Vitrine extends BaseController
    {
        public function index() //action
        {
            $produtos = new ModelProdutos();

            $info = [
                'id' => 85,
                'ip_address' => $this->request->getIPAddress()
            ];

            $this->logger->alert('Usuario #{id} logado no IP #{ip_address}',$info);

            $dados = [
                'titulo' => 'Vitrine da Loja Virtual',
                'produtos' => $produtos->find()
            ];

            return view('exibir_produtos',$dados);
        }
    }