Bitrix24 OTUS — ДЗ «Отладка и логирование»

Что делает
- Записывает текущие дату и время в файл лога при HTTP-обращении.

Структура
- `local/classes/Otus/Logger.php` — кастомный логгер
- `local/classes/Otus/LogFormatter.php` — форматтер с OTUS
- `local/js/Test/index.php` — скрипт записи в лог
- `local/js/Test/lang/ru/index.php` — языковые фразы
- `local/php_interface/init.php` — автозагрузка классов
- `bitrix/.settings_extra.php` — регистрация логгера
