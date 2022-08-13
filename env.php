<?php
/**
 * Setup application environment
 */

//print_r(__DIR__);
//die();

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG') === 'true');
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV') ?: 'prod');
