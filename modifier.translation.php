<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty translation modifier plugin
 *
 * Type:     modifier<br>
 * Name:     translation<br>
 * Purpose:  simple translation
 *
 * @param string
 * @return string
 * @author   Andrey Sergeevich Adonin
 *
 */
function smarty_modifier_translation($string) {
    return translation_plugin::getInstance()->translate($string);
}

/* vim: set expandtab: */

?>
