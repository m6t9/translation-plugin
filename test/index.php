<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors', 1);

include_once('config.php');
include_once('translation_plugin.php');
include_once('functions.php');


header('Content-Type: text/html; charset=utf-8');

echo __tr('Тестовый перевод').'<br/>'."\n";

echo translation_plugin::getInstance()->translate('Другой тестовый перевод').'<br/>'."\n";



?>