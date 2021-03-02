<?php

    namespace App\Controllers;

    use App\Models\ModelUsuario;
    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;
    use Psr\Log\LoggerInterface;

    class Usuario extends BaseController
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

        public function index()
        {
            $dados = [
                'mensagem' => '',
                'titulo' => 'Lista de Usuários'
            ];
            $modelUsuario = new ModelUsuario();
            $usuario = $modelUsuario->find();
            $dados['usuario'] = $usuario;

            return view('listar_usuarios',$dados);
        }

        public function inserir()
        {

            $dados = [
                'titulo' => 'Inserir Usuário',
                'mensagem' => '',
                'acao' => 'Inserir'
            ];

            if($this->request->getMethod() == 'post') {
                $modelUsuario = new ModelUsuario();
                $arrayUsuario = [
                    'usuario' => $this->request->getPost('usuario'),
                    'email' => $this->request->getPost('email')
                ];
                if ($this->request->getPost('senha') === $this->request->getPost('confirma')) {
                    $arrayUsuario['senha'] = md5($this->request->getPost('senha'));
                    if (!($modelUsuario->where('usuario', $arrayUsuario['usuario'])->findAll())) {
                        $modelUsuario->set($arrayUsuario);

                        if ($modelUsuario->insert()) {
                            $dados['mensagem'] = "Usuário inserido com sucesso";
                        } else {
                            $dados['mensagem'] = "Falha ao inserir usuario";
                        }
                    } else {
                        $dados['mensagem'] = 'Usuário já existente no Banco';
                    }
                } else {
                    $dados['mensagem'] = 'Senhas direntes';
                }
            }

            return view('inserir_usuario', $dados);
        }

        public function alterar($id = null)
        {
            $dados = [
                'titulo' => "Alterar dados do Usuário",
                'acao' => 'alterar',
                'mensagem' => ''
            ];
            if(!is_null($id))
            {
                $modelUsuario = new ModelUsuario();
                $usuario = $modelUsuario->find($id);
                $dados['usuario'] = $usuario;

                if($this->request->getMethod() == 'post') {
                    $arrayUsuario = [
                        'usuario' => $this->request->getPost('usuario'),
                        'email' => $this->request->getPost('email'),
                    ];
                    if (!is_null($this->request->getPost('senha')))
                    {
                        if ($this->request->getPost('senha') === $this->request->getPost('confirma')) {
                            $arrayUsuario['senha'] = md5($this->request->getPost('senha'));
                            if($modelUsuario->update($id,$arrayUsuario))
                            {
                                $dados['mensagem'] = 'Dados alterados com sucesso';
                            } else {
                                $dados['mensagem'] = 'Erro ao alterar os dados';
                            }
                        } else {
                            $dados['mensagem'] = 'Senhas diferentes';
                        }
                    }
                    $dados['usuario'] = $modelUsuario->find($id);
                }
            }
            return view('inserir_usuario', $dados);
        }

        public function excluir($id = null)
        {
            if(!is_null($id))
            {
                $usuarioModel = new ModelUsuario();
                if($usuarioModel->delete($id))
                {
                    return redirect()->to(base_url('index.php/usuario'));
                }
            } else {
                return redirect()->to(base_url('index.php/usuario'));
            }
        }

        public function resetar_senha($id = null)
        {
            if(!is_null($id)) {
                $senhaPadrao = 'senacpsg';
                $arraySenha = [
                    'senha' => md5($senhaPadrao)
                ];

                $modelUsuario = new ModelUsuario();
                if ($modelUsuario->update($id, $arraySenha)) {
                    $msg = 'Senha resetada com sucesso';
                } else {
                    $msg = 'Falha ao resetar a senha';
                }
                $dados = [
                    'usuario' => $modelUsuario->find(),
                    'titulo' => 'Gerenciamento de Usuários',
                    'mensagem' => $msg
                ];

                echo view('listar_usuarios', $dados);
            } else {
                return redirect()->to(base_url('index.php/usuario'));
            }
        }

        public function login()
        {

            if($this->request->getMethod() === 'post')
            {
                $dados['mensagem']='';

                $modelUsuario = new ModelUsuario();
                $arrayUsuario = [
                    'usuario' => $this->request->getPost('usuario'),
                    'senha' => md5($this->request->getPost('senha'))
                ];

                $usuario = $modelUsuario->where($arrayUsuario)->findAll();
                if($usuario)
                {
                    session()->set('usuarioLogado',$arrayUsuario['usuario']);
                    session()->set('loggedIn', true);
                    return view('pagina_gerenciamento');
                } else {
                    session()->setFlashdata('mensagem','Erro no Login: Usuario ou Senha incorreto');
                }
            }

            return view('login');
        }

        public function logout()
        {
            session()->destroy();
            return redirect()->to(base_url());
        }
    }
