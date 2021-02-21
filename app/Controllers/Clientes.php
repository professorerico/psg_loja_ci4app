<?php


    namespace App\Controllers;

    use App\Controllers;

    class Clientes extends BaseController
    {
        public function index()
        {
            $dados = [
              'titulo' => 'Gerenciamento de Clientes'
            ];
            return view('inserir_clientes',$dados);
        }
    }