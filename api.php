<?php
require 'api/WebApi.php';
require 'api/product.php';
require 'api/chemical.php';
require 'api/student.php';
require 'api/chemicalin.php';
require 'api/lab.php';
require 'api/labowner.php';
require 'api/staff.php';
require 'api/user.php';

$api = new Api();
$api->handle();