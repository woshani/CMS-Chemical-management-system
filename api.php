<?php
require 'api/WebApi.php';
require 'api/product.php';
require 'api/chemical.php';
require 'api/user.php';

$api = new Api();
$api->handle();