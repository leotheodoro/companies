<?php

$basePath = dirname(__FILE__);

$name = basename($_FILES['image']['name']);
$tmpFile = $_FILES['image']['tmp_name'];

$ext = pathinfo($name, PATHINFO_EXTENSION);
$ext = strtolower($ext);

$newName = uniqid(time()).'.'.$ext;
$path = "{$basePath}\images\\".$newName;

try {
  move_uploaded_file($tmpFile, $path);
  echo json_encode(['status' => 200, 'message' => 'Imagem enviada com sucesso.', 'name' => $path]);

  return http_response_code(200);
} catch(Exception $e) {
  echo json_encode(['status' => 400, 'message' => 'Ocorreu um erro ao enviar a imagem.']);
  
  return http_response_code(400);
}

  
