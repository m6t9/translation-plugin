# translation-plugin
Интеграция переводов в проекты PHP.

Читайте этот документ на других языках: [English](README.md).

## Установка

TODO

## Использование

TODO

```php
echo translation_plugin::getInstance()->translate('Translate it');

//Short call function:
function __tr($string) {
  return translation_plugin::getInstance()->translate($string);
}
echo __tr('Short call function');
 
```

## Лицензия

<a href="http://opensource.org/licenses/mit-license.php" rel="nofollow">MIT license</a>
