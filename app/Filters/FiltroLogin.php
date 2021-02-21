<?php
    namespace App\Filters;

    use CodeIgniter\Filters\FilterInterface;
    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;

    class FiltroLogin implements FilterInterface
    {
        public function before(RequestInterface $request, $arguments = null)
        {
            if (!session()->loggedIn === true)
            {
                return redirect()->to('/index.php/usuario/login');
            }
        }

        public function after(RequestInterface $request,ResponseInterface $response, $arguments =null)
        {
            //algo aqui
        }
    }