<?php

session_start();
session_unset();
session_destroy();

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

header('Location: /'.$_ENV['PROJECT_PATH'].'/index.php');
exit;
