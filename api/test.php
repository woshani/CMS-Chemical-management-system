<?php
require 'jwt_helper.php';

$id = '1234';
$token = array();
$token['id'] = $id;
echo JWT::encode($token, 'secret_server_key');

$result = JWT::decode($token, 'secret_server_key');
echo $token->id;