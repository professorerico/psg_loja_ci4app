<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ModelUsuario extends Model
    {
        protected $table      = 'tbUsuario';
        protected $primaryKey = 'id';

        protected $returnType = 'array';

        protected $allowedFields = ['usuario', 'senha', 'email', 'nivel'];

        protected $useTimestamps = true;
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';

    }
