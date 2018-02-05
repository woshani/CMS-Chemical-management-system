<?php
require 'WebApi.php';
require 'chemical.php';
require 'student.php';
require 'chemicalusage.php';
require 'chemicalin.php';
require 'lab.php';
require 'labowner.php';
require 'staff.php';
require 'user.php';

$api = new Api();
$api->handle();