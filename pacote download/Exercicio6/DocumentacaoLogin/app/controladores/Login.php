<?php 

require 'app/modelos/Usuario.php';
require 'Controlador.php';

/**
* Esta classe inicia uma nova sessão, disponibiliza métodos referentes a login, cadastro, informações e finalizar sessão.
*/
class LoginController extends Controller  {
    
    /**
    * Atributo da classe login
    * @var Usuario Documenta o tipo de variável. 
    */
    private $loggedUser;
    
    /**
    *  Esta classe inicia uma nova sessão e faz a verificação se a sessão do usuário já foi iniciada.
    */
    function __construct() {
        session_start();
        if (isset($_SESSION['user'])) $this->loggedUser = $_SESSION['user'];
    }
    
    /**
    *  Este método realiza as sequintes etapas: verifica se a a sessão foi iniciada, converte a array para um usuário, confere a formatação do e-mail e senha, 
    *  valida as informações de login e retorna os dados do usuário
    */
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['users'])) {
                foreach ($_SESSION['users'] as $user) {
                    if ($user->igual($_POST['email'], $_POST['senha'])) {
                        $_SESSION['user'] = $this->loggedUser = $user;
                        break;
                    }
                }
            }

            if ($this->loggedUser) {
                header('Location: index.php?acao=info');
            } else {
                header('Location: index.php?email=' . $_POST['email'] . '&mensagem=Usuário e/ou senha incorreta!');
            }
        } else {
            if (!$this->loggedUser) {
                $this->view('users/login');
            } else {
                header('Location: index.php?acao=info');
            }
        }
    }

    /**
    *  Este método realiza as seguintes etapas: verifica se a variável iniciada é uma array, converte para usuário, valida a formatação dos dados, valida se o e-mail 
    *  já é cadastrado, cria um novo usuário com os dados informados, retorna para a página de login com o email já preenchido.
    */
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_SESSION['users'])) $_SESSION['users'] = array();
            
            foreach ($_SESSION['users'] as $user) {
                if ($user->email == $_POST['email']) {
                    header('Location: index.php?acao=cadastrar&mensagem=Email já cadastrado!');
                    return;
                }
            }
            
            $user = new Usuario($_POST['email'], $_POST['senha'], $_POST['nome']);
            array_push($_SESSION['users'], $user);
            
            header('Location: index.php?email=' . $_POST['email'] . '&mensagem=Usuário cadastrado com sucesso!');
            return;
        }
        $this->view('users/cadastrar');
    }

    /**
    *  Este método realiza as seguintes etapas: verifica se não possui conflitos entre o usuário logado e o usuário tentando realizar a ação e retorna a view
    *  contendo as informações deste usuario.
    */
    public function info() {
        if (!$this->loggedUser) {
            header('Location: index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');    
            return;
        }
        $this->view('users/info', $this->loggedUser);        
    }

    /**
    *  Este método realiza as seguintes etapas: verifica se não existe um conflito entre o usuário logado e o usuário tentando realizar a ação e destrói a sessão do usuário.
    */
    public function sair() {
        if (!$this->loggedUser) {
            header('Location: index.php?acao=entrar&mensagem=Você precisa se identificar primeiro');
            return;
        }
        unset($_SESSION['user']);
        header('Location: index.php?mensagem=Usuário deslogado com sucesso!');
    }
}

?>