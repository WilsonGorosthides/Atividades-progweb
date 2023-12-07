<?php
// Desabilita warnings
error_reporting(E_ALL ^ E_WARNING);

// Define o basepath globalmente
define('BASEPATH', '/AppLogin-Listagem/');

include_once __DIR__ . '/app/Database.php';
include_once __DIR__ . '/app/controladores/Controlador.php';
include_once __DIR__ . '/app/controladores/Login.php';
include_once __DIR__ . '/app/modelos/Usuario.php';
include_once __DIR__ . '/libs/Route.php';

use App\Database;
use App\Controladores\LoginController;
use Steampixel\Route;

/**
 * Cria o schema no banco de dados
 */
Database::createSchema();

/**
 * Cria uma instância do controlador para uso
 */
$controller = new LoginController();

/**
 * Parte responsável pelo direcionamento das requisições aos 
 * respectivos métodos do controlador.
 */
Route::add('/login', fn () => $controller->loginIndex(), ['get']);
Route::add('/register', fn () => $controller->cadastrarIndex(), ['get']);
Route::add('/user/info', fn () => $controller->info(), ['get']);
Route::add('/user/list', fn () => $controller->listar(), ['get']);

Route::add('/login', fn ()  => $controller->login(), ['post']);
Route::add('/register', fn ()  => $controller->cadastrar(), ['post']);
Route::add('/logout', fn () => $controller->sair(), ['post']);

// Rota auxiliar para redirecionar o usuário.
Route::add('/', function () {
    header('Location: ' . BASEPATH . 'login');
}, ['get']);

Route::add('/.*', function () {
    http_response_code(404);
    echo "Page not found!";
}, ['get']);


// Inicia o router
Route::run(BASEPATH);
