<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

include_once 'config/Database.php';
include_once 'controllers/FutbolistaController.php';

$database = new Database();
$db = $database->getConnection();
$controller = new FutbolistaController($db);

$method = $_SERVER['REQUEST_METHOD'];
// Capturamos el ID si viene en la URL (ej: index.php/5)
$path = isset($_SERVER['PATH_INFO']) ? explode('/', $_SERVER['PATH_INFO']) : [];
$id = isset($path[1]) ? $path[1] : null;
$data = json_decode(file_get_contents("php://input"));

$response = $controller->handleRequest($method, $id, $data);
echo json_encode($response);