<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ModelProdutos extends Model
    {
        protected $table = 'tbProdutos';
        protected $primaryKey = 'codigo';

        protected $returnType = 'object';

        protected $allowedFields = ['nome', 'descricao', 'preco', 'validade', 'imagem'];

    }