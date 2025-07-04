<?php
namespace App\Controller;

use App\Config\Core\AbstractController;

class SecurityController extends AbstractController
{
    public function index()
    {
        $this->renderHtml('security/login.html.php');
    }

    public function store()
    {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($login === 'manica@gmail.com' && $password === 'manica123') {
            // Redirige vers la liste des commandes
            header('Location: /list');
            exit;
        } else {
            $error = "Identifiants invalides";
            $this->renderHtmlWithError('security/securityLayout.php', $error);
        }
    }

    private function renderHtmlWithError($view, $error)
    {
        ob_start();
        $error = $error; // pour la vue
        require_once '../template/' . $view;
        $contentForLayout = ob_get_clean();
        require_once '../template/layout/base.layout.php';
    }

    public function create() {}
    public function destroy() {}
    public function show() {}
    public function edit() {}
}