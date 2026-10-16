Bitrix24 OTUS — ДЗ 

1️⃣ Отладка и логирование
Что делает
- Записывает текущие дату и время в файл лога при HTTP-обращении.
Структура
- `local/classes/Otus/Logger.php` — кастомный логгер
- `local/classes/Otus/LogFormatter.php` — форматтер с OTUS
- `local/js/Test/index.php` — скрипт записи в лог
- `local/js/Test/lang/ru/index.php` — языковые фразы
- `local/php_interface/init.php` — автозагрузка классов
- `bitrix/.settings_extra.php` — регистрация логгера

5️⃣ Разработка собственного компонента
Разработан собственный компонент Битрикс24 otus:currency.rate для отображения курса выбранной валюты относительно базовой валюты портала.
Структура проекта
- `local/components/otus/currency.rate/` — собственный компонент.
- `.description.php` — описание компонента.
- `.parameters.php` — настройка параметра выбора валюты.
- `class.php` — PHP-класс с логикой компонента.
- `templates/.default/template.php` — шаблон отображения.
- `lang/ru/` — языковые файлы компонента.
- `otus/currencies.php` — страница подключения компонента.

- Проверка
Страница: https://oleg.w-s.su/otus/currencies.php
