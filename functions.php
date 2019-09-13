<?php


function __tr($string) {
    return translation_plugin::getInstance()->translate($string);
}


?>