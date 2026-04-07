<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/Database.php';
include_once 'controllers/FutbolistaController.php';

$database = new Database();
$db = $database->getConnection();
$controller = new FutbolistaController($db);

$method = $_SERVER['REQUEST_METHOD'];

// Capturamos el ID de forma flexible
$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} elseif (isset($_SERVER['PATH_INFO'])) {
    $path = explode('/', $_SERVER['PATH_INFO']);
    $id = isset($path[1]) ? $path[1] : null;
}

// Capturamos los datos del Body para POST y PUT
$data = json_decode(file_get_contents("php://input"));

// Enviamos la petición al controlador
$response = $controller->handleRequest($method, $id, $data);

// Mostramos la respuesta final
echo json_encode($response);