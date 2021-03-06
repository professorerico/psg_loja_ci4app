<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ModelUsuario extends Model
    {
        protected $table      = 'tbUsuario';
        protected $primaryKey = 'id';

        protected $returnType = 'object';

        protected $allowedFields = ['usuario', 'senha', 'email', 'nivel'];

        protected $useTimestamps = true;
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';

        /**
         *  retorna verdadeiro ou falso
         */
        public function buscaUsuario($dados, $usuario)
        {
            if (!is_null($usuario))
            {
                $senhaMd5 = md5($dados['senha']);
                $senhaHash = $usuario->senha;

                if($usuario->senha === $senhaMd5 || password_verify($dados['senha'],$senhaHash))
                {
                    return true;
                }
            }
            return false;
        }

    }