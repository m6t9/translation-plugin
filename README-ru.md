# translation-plugin
Интеграция переводов в проекты PHP.

Читайте этот документ на других языках: [English](README.md).

## Установка

1. Подключить к проекту класс: translation_plugin.php
2. Установить в конфигурации проекта константы для перевода, пример: config.php
3. Создать директорию для файла с массивом переводов, если это необходимо
4. Если используются шаблоны SMARTY, положить файл modifier.translation.php в директорию плагинов SMARTY

## Использование

#### В PHP:

```php
echo translation_plugin::getInstance()->translate('Translate it');

// Короткая функция для вызова перевода (есть в файле functions.php)
function __tr($string) {
  return translation_plugin::getInstance()->translate($string);
}
echo __tr('Short call function');
 
```

При обращении к переводчику, в файле, указанном в качестве хранилища, в массив будет добавлен новый элемент.
Для перевода необходимо заменить NULL на строку перевода.

#### В шаблонах SMARTY:

```SMARTY

{'Close'|translation}

{'/img/logo-eng.png'|translation}

 
```

## Лицензия

<a href="http://opensource.org/licenses/mit-license.php" rel="nofollow">MIT license</a>
