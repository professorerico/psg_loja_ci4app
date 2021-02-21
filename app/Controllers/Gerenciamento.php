<?php

    namespace App\Controllers;


    class Gerenciamento extends BaseController
    {
        public function index(){
            $dados = [

            ];

            return view('pagina_gerenciamento',$dados);
        }
    }