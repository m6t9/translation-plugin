<?php
/*
 * Translations
 *
 * Call example:
 * echo translation_plugin::getInstance()->translate($string);
 *
 * smarty plugin: modifier.translation.php
 * {'тест'|translation}
 *
 * Short call function:
 * function __tr($string) {
 *     return translation_plugin::getInstance()->translate($string);
 * }
 * echo __tr('Short call function');
 *
 * Global settings example:
 * define('TRANSLATION_STORE', ROOT . 'locale' . DIRECTORY_SEPARATOR . 'translation.php');
 * define('TRANSLATION_LANG_FROM', 'ru');
 * define('TRANSLATION_LANG', 'eng');
 */

class translation_plugin {
    protected static $_instance;

    public $on = false;

    public $translation = array();

    public $lang_from = 'ru';
    public $lang_to = 'eng';

    public $store = 'translation.php';
    public $store_type = 'file';

    // private constructor restricts implementation getInstance ()
    private function __construct() {
        if (!defined('TRANSLATION_LANG_FROM')) return;
        if (!defined('TRANSLATION_LANG')) return;
        $this->lang_from = TRANSLATION_LANG_FROM;
        $this->lang_to = TRANSLATION_LANG;
        if (defined('TRANSLATION_STORE_TYPE')) $this->store_type = TRANSLATION_STORE_TYPE;
        if (defined('TRANSLATION_STORE')) $this->store = TRANSLATION_STORE;

        $this->on = true;

        if (empty($this->translation) or !is_array($this->translation)) {
            $this->load();
        }
    }

    public static function getInstance() {
        if (self::$_instance === null) self::$_instance = new self;
        return self::$_instance;
    }

    // prohibit object cloning by modifier private
    private function __clone() {
    }

    // prohibit object cloning by modifier private
    private function __wakeup() {
    }

    // transfer
    public function translate($string, $lang_to=false) {
        if (!$this->on) return $string;
        if (!$lang_to) $lang_to = $this->lang_to;
        $key_translation = $this->get_key($string);

        $changes = false;
        if (!isset($this->translation[$key_translation])) {
            $this->translation[$key_translation] = array();
            $this->translation[$key_translation][$this->lang_from] = $string;
            $changes = true;
        }
        if (!isset($this->translation[$key_translation][$lang_to])) {
            $this->translation[$key_translation][$lang_to] = NULL;
            $changes = true;
        }
        if ($changes) $this->save($key_translation);

        if (!is_null($this->translation[$key_translation][$lang_to])) {
            return $this->translation[$key_translation][$lang_to];
        }

        return $string;
    }

    // key in the translation array
    public function get_key($string) {
        return md5($string);
    }

    // reading an array of translations
    public function load() {
        $this->translation = array();
        switch ($this->store_type) {
            //file
            default :
                if (file_exists($this->store)) {
                    include($this->store);
                    if (!empty($translation)) {
                        $this->translation = $translation;
                    }
                }
        }
    }

    // saving an array of translations
    public function save($key_translation) {
        switch ($this->store_type) {
            //file
            default :
                file_put_contents($this->store, '<?php $translation = ' . var_export($this->translation, true) . ';' . "\n", LOCK_EX);
        }
    }


}