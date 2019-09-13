# translation-plugin
Integration of translations into PHP projects

Read this document in other languages: [Russian](README-ru.md).

## Installation

1. Connect the class to the project: translation_plugin.php
2. Set the constants for translation in the project configuration, for example: config.php
3. Create a directory for the file with an array of translations, if necessary
4. If you are using SMARTY templates, put the modifier.translation.php file in the SMARTY plugins directory

## How to use

#### In PHP:

```php
echo translation_plugin::getInstance()->translate('Translate it');

// Short function to call the translation (available in the functions.php file)
function __tr($string) {
  return translation_plugin::getInstance()->translate($string);
}
echo __tr('Short call function');
 
```

When accessing the translator, a new element will be added to the array in the file specified as the repository.
To translate, you must replace NULL with the translation string.

#### In SMARTY templates:

```SMARTY

{'Close'|translation}

{'/img/logo-eng.png'|translation}

 
```

## License

<a href="http://opensource.org/licenses/mit-license.php" rel="nofollow">MIT license</a>
