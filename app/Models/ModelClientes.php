<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ModelClientes extends Model
    {
        protected $table = 'tbClientes';

        protected $useAutoIncrement = true;
        protected $primaryKey = 'id';

        protected $returnType = 'object';

        protected $allowedFields = ['nome', 'email', 'telefone', 'dataNascimento', 'endereco'];
        protected $useTimestamps = true;

        protected $createdField = 'created_in';
        protected $updatedField = 'updated_in';

    }